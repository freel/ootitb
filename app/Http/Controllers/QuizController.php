<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class QuizController extends Controller
{
    public function index($parent_id = '0'){
        $categories = Category::select('id', 'title', 'description_short')
          ->where('parent_id', $parent_id)
          // ->whereHas('children',function($query){$query->with('questions');
          ->where(function($q){
            $q->whereHas('children',function($query){$query->with('questions');})
            ->orHas('questions')
            ->orHas('papers')
            ;

          })
          // ->has('children.questions')
          ->paginate(12);
          // ->toSql();
        // return dd($categories);
        return view('quiz.index', [
          'categories' => $categories
        ]);
    }

    /** Данные тестирования
    * @var $id - выбранная пользователем категория вопросов
    * @var $papers - билеты в этой категории
    * @var $paper - случайный билет // TODO: выбор номера или случайный(поестить в try_quiz)
    * @var $questions - коллекция вопросов с ответами
    */
    private function get_quiz($id){
      Category::where('id', $id)
        ->first()
        ->papers->count() ? $questions = $this->get_paper($id) : $questions = $this->get_rand_paper($id);
      // return dd($papers_count);
      // if ($papers_count)


        return $questions + [
            'category' => $id,
          ];
    }

    private function get_paper($id){
      $papers = Category::with(['papers' => function($query) {
          $query
            ->select('id', 'paper_index', 'category_id');
        }])
        ->where('id', $id)
        ->first()
        ->papers;
      $paper = $papers[rand(0, $papers->count()-1)];
      $questions = $paper
        ->questions()
        ->select('questions.id', 'title', 'text')
        ->with(['answers' => function($query){
          $query->select('id', 'question_id', 'text');
        }])
        ->get();
        // return dd($paper);
        return [
          'paper' => $paper,
          'questions' => $questions
        ];
    }

    private function get_rand_paper($id){
      $category = Category::where('id', $id)
        ->with(['questions' => function($query){
          $query->select('questions.id', 'title', 'text')
          ->with(['answers' => function($query){
            $query->select('id', 'question_id', 'text');
          }]);
        }])
        ->first();
        $questions = $category['questions']->random(20);
        $paper = collect([
          'id' => '0',
          'paper_index' => 'random',
          'category' => $id
        ]);
        $retval = [
          'paper' => $paper,
          'questions' => $questions
        ];
        session()->put($retval);
        // return dd($paper);
        return $retval;
    }

    /** Пробное тестирование
    * @var $id - выбранная пользователем категория вопросов
    * // TODO: выбор номера или случайный
    * @return страницу с пробным тестом + параметры
    */
    public function try_quiz($id){
      // return $this->get_rand_paper($id);
        return view('quiz.exam',
            $this->get_quiz($id)
          );
    }

    /** Экзаменационное тестирование
    * @var $id - выбранная пользователем категория вопросов
    * @var $timer - время на тестирование в секундах
    * @return страницу с пробным тестом + параметры
    */
    public function exam_quiz($id){
        $timer = 0.2;
        return view('quiz.exam',
            $this->get_quiz($id) +
            ['timer' => $timer,]
          );
    }

    public function exam_quiz_check(Request $request, $category_id, $paper_id){
      return $this->quiz_check($request, $category_id, $paper_id);
    }

    public function try_quiz_check(Request $request, $category_id, $paper_id){
      return $this->quiz_check($request, $category_id, $paper_id);
    }

    /** Проверка результата экзаменационного тестирования
    * @var $category_id - категория вопросов
    * @var $paper_id - номер билета
    * @var $paper - билет по индексу
    * @var $questions - коллекция вопросов с ответами
    *
    * @return
    */
    public function quiz_check(Request $request, $category_id, $paper_id){
      if (!$paper_id) {
        $paper = 0;
        $questions = session()->get('paper');
      }else{
        $papers = Category::with('papers')
          ->where('id', $category_id)
          ->first()
          ->papers;
        $paper = $papers[$paper_id-1];
        $questions = $paper->questions()
          ->with(['answers' => function($query){
            $query->select('id', 'question_id', 'text', 'right');
          }])
          ->get();
      }
      $user_answers = $this->quizArrayMerge($request->answers);
      // foreach ($user_answers as $user_answer){

      $mistakes = [];
      $right_count = 0;
      foreach ($questions as $question){
        $right = $question->answers->where('right', true);
        $wrong_answers = [];

        // проверка существования
        if (isset($user_answers[$question->id])) {
           //сравниваем количество ответов
          if ($right->count() == count($user_answers[$question->id])){
            // последовательная проверка ответов
            foreach ($user_answers[$question->id] as $answer_id){
            // foreach ($right as $answer){
              $right->where('id', $answer_id)->count() ? $right_count++ : $wrong_answers[] = $question->answers->where('id', $answer_id)->first();
              // return dd($right->where('id', $answer_id)->count(),$right_count++ );
            }
          }else {
            foreach ($user_answers as $key => $value) {
              $wrong_answers[] = $question->answers->where('id', $value);
            }
          }
        } else {
            $wrong_answers[] = collect((object)[
              'text' => "Вы не ответили на этот вопрос"
            ]);

        }
        if ($wrong_answers){
          $mistakes[] = (object)[
            'question'=>$question,
            'wrong'=>collect((object)$wrong_answers),
            'right'=>$right,
          ];

        }
      }
      $result = [
        'paper' => $paper,
        'questions_count'=>$questions->count(),
        'right_count' => $right_count,
        'mistakes' => collect((object)$mistakes)
      ];
      return $this->quizResult($result);
    }

    /** Отображение результата тестирования
    *
    * @var $result - данные результата
    */
    private function quizResult($result){
      return view('quiz.result', $result);
    }

    /** Объединение массива ответов
    *
    * @var $arr - массив массивов ответов
    */
    private function quizArrayMerge($arr){
      $result_arr=[];
      foreach ($arr as $arr_val) {
        foreach ($arr_val as $key=>$val){
          $result_arr[$key][] = $val;
        }
      }
      return $result_arr;
    }

}
