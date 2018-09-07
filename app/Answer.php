<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['text', 'right'];

    //Вопрос которому принадлежат ответы
    public function question(){
      $this->belongsTo('App\Question');
    }
}
