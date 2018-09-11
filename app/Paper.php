<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable=['paper_index'];

    // Группа в которой находится билет
    public function testGroup(){
      return $this->belongsTo('App\TestGroup');
    }

    // Вопросы включенные в билет
    public function questions(){
      return $this->belongsToMany('App\Question');
    }

}
