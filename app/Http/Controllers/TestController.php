<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestGroup;

class TestController extends Controller
{
    public function index($parent_id = '0'){
        $retval = ['test_groups'=>TestGroup::where('parent_id', $parent_id)->paginate(12)];
        return view('test.index', $retval);
    }

    public function exam($id){
        $papers = TestGroup::with('papers')->where('id', $id)->first()->papers;
        $paper = $papers[rand(0, $papers->count()-1)];
        // return dd($papers->questions()->paginate(1)->first());
        $questions = $paper->questions()->get();
        return view('test.exam',[
            'test_group' => $id,
            'paper' => $paper,
            'questions' => $questions,
          ]);
    }

    public function answer(Request $request, $id, $paper_id){
      $papers = TestGroup::with('papers')->where('id', $id)->first()->papers;
      $paper = $papers[$paper_id-1];
      $questions = $paper->questions()->with('answers')->get();
      $user_answers = $request->answers;


      // foreach (collect($mistakes) as $value) {
      //   return dd($value->question);
      // }
      // return dd (collect((object)$mistakes));
      return view('test.result', $this->check_results($paper, $questions, $user_answers));
    }

    /** Проверка результатов
    *
    * @var $paper - коллекция вопросов с id - номер билета
    */
    private function check_results($paper, $questions, $user_answers){
      //TODO обработка результатов
      foreach ($questions as $question){
        $wrong_answers = [];
        $right_answers = [];
        foreach ($question->answers as $answer){
          if (in_array($answer->id, $user_answers) && (!$answer->right)){
            $wrong_answers[] = $answer;
          }
        }
        if ($wrong_answers){
          $mistakes[] = (object)[
            'question'=>$question,
            'mistakes'=>$wrong_answers,
            'right'=>$question->answers->where('right',true),
          ];

        }
      }
      // return dd($mistakes);
      $result = [
        'questions_count' => $questions->count(),
        'paper' => $paper,
        'mistakes' => collect((object)$mistakes)
      ];
      return $result;

    }

}
