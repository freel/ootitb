<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CertificationArea;

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
          'question'            => [],
          'certification_areas' => CertificationArea::with('children')->where('parent_id', '0')->get(),
          'delimiter'           => ''
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
        // return dd($question->certification_areas());

        //Есть привязка к областям проверки
        if($request->input('certification_areas')) :
          $question->certification_areas()->attach($request->input('certification_areas'));
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
      // return CertificationArea::with('children')->where('id', '7');
      // return dd($question->certification_areas()->with('children')->get());
      // return ($question->certification_areas()->get()->contains(CertificationArea::with('children')->where('id', '7')->first()) ? 'true' : 'false');
      $certification_areas = CertificationArea::with('children')->where('parent_id', '0')->get();

      // $ret='';
      //
      // // return get_class($question->certification_areas());
      //
      //
      // foreach ($certification_areas as $certification_area_list) {
      //   // dd($certification_area_list);
      //   if ($question->certification_areas()->get()->contains($certification_area_list))
      //   // if ($question->certification_areas()->get()->contains(CertificationArea::with('children')->where('id', '7')->first()))
      //     $ret = $ret + '11' ;
      // }
      //
      // return $ret;
      return view('admin.questions.edit', [
        'question'            => $question,
        'areas'               => $question->certification_areas()->get(),
        'answers'             => $question->answers()->get(),
        'certification_areas' => $certification_areas,
        'delimiter'           => ''
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
        if($request->input('certification_areas')) :
          $question->certification_areas()->attach($request->input('certification_areas'));
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
