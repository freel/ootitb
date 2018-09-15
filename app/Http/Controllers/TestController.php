<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestGroup;

class TestController extends Controller
{
    public function index($parent_id = '0'){
        $retval = ['test_groups'=>TestGroup::where('parent_id', $parent_id)->paginate(8)];
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
      $questions = $paper->questions()->get();
      $answers = $request->answers;
      //TODO обработка результатов
      foreach ($questions as $question){
        $right_answers = $question->answers()->where('right',true)->get();
        foreach ($right_answers as $right_answer){
          if (!in_array($right_answer->id,$answers)){
            $mistakes[] = [
              'question'=>$question
            ];
          }
        }
      }
      return view('test.result',[
        'paper' => $paper,
        'mistakes' => collect($mistakes)
      ]);
    }
}
