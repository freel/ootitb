<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class QuizController extends Controller
{
    public function index($parent_id = '0'){
        $categories = Category::select('id', 'title', 'description_short')->where('parent_id', $parent_id)->paginate(12);
        return view('quiz.index', [
          'categories' => $categories
        ]);
    }

    public function exam($id){
        $papers = Category::with(['papers' => function($query) {
            $query->select('id', 'paper_index', 'category_id');
        }])->where('id', $id)->first()->papers;
        $paper = $papers[rand(0, $papers->count()-1)];
        $questions = $paper->questions()->select('questions.id', 'title', 'text')->with(['answers' => function($query){
            $query->select('id', 'question_id', 'text');
        }])->get();
        return view('quiz.exam', [
            'category' => $id,
            'paper' => $paper,
            'questions' => $questions,
          ]);
    }

    /** Проверка результата тестирования
    * @var $category_id - категория вопросов
    * @var $paper_id - номер билета
    * @var $paper - билет по индексу
    * @var $questions - коллекция вопросов с ответами
    */
    public function quiz_check(Request $request, $category_id, $paper_id){
      $papers = Category::with('papers')->where('id', $category_id)->first()->papers;
      $paper = $papers[$paper_id-1];
      $questions = $paper->questions()->with(['answers' => function($query){
          $query->select('id', 'question_id', 'text', 'right');
      }])->get();
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
        // return dd( $question->answers);
        if ($wrong_answers){
          $mistakes[] = (object)[
            'question'=>$question,
            'wrong'=>collect((object)$wrong_answers),
            'right'=>$right,
          ];

        }
      }
      // return dd($mistakes);
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
