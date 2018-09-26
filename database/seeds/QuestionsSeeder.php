<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Заполнение вопросами

        $file = file_get_contents('database/seeds/paper.json');
        $json = json_decode($file,true);
        // dd($json);
        $category = Category::where('title', 'Слесарь по контрольно-измерительным приборам и автоматике')->first();
        // dd($category);
        foreach ($json as $key => $papers_json){
          foreach ($papers_json as $paper_json){
            $paper = $category->papers()->create([
                'paper_index'   => $paper_json['paper'],
            ]);
            foreach ($paper_json['questions'] as $key=>$question_json) {
              $question = Question::create([
                  'title' => $key + 1,
                  'text' => $question_json['text']
              ]);
              $question->papers()->attach($paper);

              $answers = [];
              foreach ($question_json['answers'] as $key => $answer) {
                 $answers[] = [
                   'text'  => $answer['text'],
                   'right' => isset($answer['right']),
                 ];
              }
              // dd($answers);
              $question->answers()->createMany($answers);
              // dd( $question_json, $key);
            }

          }
        }
        // $category = Category::->where('title', 'Слесарь по контрольно-измерительным приборам и автоматике')->first();
        // // Количество билетов
        // $paper_num = 6;
        // //  создание билетов
        // for ($paper_index = 1; $paper_index <= $paper_num; ++$paper_index){
        //   $paper = $category->papers()->create([
        //     'paper_index'   => $paper_index,
        //   ]);
        //   // Заполнение билетов
        //   $question = Question::create([
        //     'title', 'text'
        //   ]);
        //   // Присоединение модели билета
        //   $question->papers()->attach($paper);
        //   //Создание ответов
        //
        // }

    }
}
