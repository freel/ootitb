<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return dd(Question::with('categories:title')->paginate(10));
        return view ('admin.questions.index', [
          'questions' => Question::with('categories:title')->paginate(10)
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
          'categories' => Category::with('children')->where('parent_id', '0')->get(),
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
        $this->storeQuestion($request->all());
        return redirect()->route('admin.question.index');
    }


    /**
     * Сохранение данных
     *
     * @var $data - массив вопроса ['title', 'text', papers[], answers[]]
     */
    private function storeQuestion(Array $data, Array $categories = null){

      // dd($data);
      if (Question::where('text', $data['text'])->count()){
        return false;
      }

      $question = Question::create($data);

      // Если выбрана категория
      if($categories){
        $question->categories()->attach($categories);
      }
      elseif(isset($data['categories'])) {
        $question->categories()->attach($data['categories']);
      }

      // Если выбран билет
      if(isset($data['papers'])) :
        $question->papers()->attach($data['papers']);
      endif;

      //Есть ответы
      if($data['answers']) :
        foreach ($data['answers'] as $key=>$answer) {
          $answers[]=['text'=>$answer, 'right'=>in_array($key, $data['right']) ];
        }
        $question->answers()->createMany($answers);
      endif;

      return true;
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
      $categories = Category::with('children')->where('parent_id', '0')->get();

      return view('admin.questions.edit', [
        'question'    => $question,
        'areas'       => $question->categories()->get(),
        'answers'     => $question->answers()->get(),
        'categories' => $categories,
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
        $question->update($request->all());

        //Отцепляем группы и прицепляем после изменений
        $question->papers()->detach();
        if($request->input('papers')) :
          $question->papers()->attach($request->input('papers'));
        endif;

        //Работаем с ответами
        $question->answers()->delete();
        if($request->input('answers')) :
          foreach ($request->input('answers') as $key=>$answer) {
            $answers[]=['text'=>$answer, 'right'=>in_array($key, $request->input('right')) ];
          }
          $question->answers()->createMany($answers);
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

    /**
     * Store a mass created resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massStore(Request $request){
      $path = $request->file('fileToUpload')->store('mass_store');
      $assigned_array = $this->txtToArray($path);
      foreach ($assigned_array as $value) {
        $this->storeQuestion($value, $request->input('categories'));
      }

      return redirect()->route('admin.question.index');
    }


    /**
     * Преобразование файла в массив
     *
     * @param  String  $path путь к файлу
     * @var $assigned_array - массив структур [
     * title - заголовок вопроса
     * text - текст вопроса
     * answers - массив ответов [
     *    id => текст ответа
     *   ]
     * right - массив индексов ответов {answers.id} являющихся верными
     * ]
     * // TODO: добавить область вопросов
     */
    private function txtToArray(String $path){
      $file = explode("\n",mb_convert_encoding(Storage::get($path),"UTF-8" , "windows-1251"));
      $assigned_array = [];

      foreach ($file as $line){
        if ($line){
          $exploded_line = explode(";",$line);
          if ($exploded_line[0] != null){
            $question_number = $exploded_line[0];
            $assigned_array[$question_number] = [
              "title" => $exploded_line[0],
              "text" => $exploded_line[1],
              "answers" => [],
              "right" => [],
            ];
          } else {
            $assigned_array[$question_number]["answers"][] = trim($exploded_line[2]);
            if (trim($exploded_line[3]) == "*"){
              // return dd(key($assigned_array[$question_number]["answers"]));
              $assigned_array[$question_number]["right"][] = count($assigned_array[$question_number]["answers"]) - 1;
            }
          }
        }
      }
      return $assigned_array;

    }
}
