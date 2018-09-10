<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestGroup;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.questions.index', [
          'questions' => Question::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.questions.create', [
          'question'    => [],
          'test_groups' => TestGroup::with('children')->where('parent_id', '0')->get(),
          'delimiter'   => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return dd($request->input('answers'));
        $question = Question::create($request->all());
        // return dd($question->test_groups());

        //Есть привязка к областям проверки
        if($request->input('test_groups')) :
          $question->test_groups()->attach($request->input('test_groups'));
        endif;

        //Есть ответы
        if($request->input('answers')) :
          // $answers = [];
          foreach ($request->input('answers') as $key=>$answer) {
            $answers[]=['text'=>$answer, 'right'=>in_array($key, $request->input('right')) ];
            // $question->answers()->create(['text'=>$answer, 'right'=>in_array($key, $request->input('right')) ]);
          }
          $question->answers()->createMany($answers);
        endif;

        return redirect()->route('admin.question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
      $test_groups = TestGroup::with('children')->where('parent_id', '0')->get();

      return view('admin.questions.edit', [
        'question'    => $question,
        'areas'       => $question->test_groups()->get(),
        'answers'     => $question->answers()->get(),
        'test_groups' => $test_groups,
        'delimiter'   => ''
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question = Question::create($request->all());
        if($request->input('test_groups')) :
          $question->test_groups()->attach($request->input('test_groups'));
        endif;

        return redirect()->route('admin.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
