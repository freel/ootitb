<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestGroup;

class TestController extends Controller
{
    public function index($parent_id = '0'){
        $retval = ['test_groups'=>TestGroup::where('parent_id', $parent_id)->paginate(8)];
        // if ($parent_id){
        //   $tests_count = TestGroup::where('id', $parent_id)->first()->papers()->count();
        //   if($tests_count>0){
        //     $retval += ["start_test" => true];
        //   }
        //
        // }
        return view('test.index', $retval);
    }

    public function exam($id){
        $papers = TestGroup::with('papers')->where('id', $id)->first()->papers->first();
        // return dd($papers->questions()->paginate(1)->first());
        $questions = $papers->questions()->paginate(1);
        return view('test.exam',[
            'papers' => $papers,
            'questions' => $questions,
            'answers' => $questions->first()->answers()->get(),
          ]);
    }
}
