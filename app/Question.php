<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['title', 'text', 'create_by', 'modified_by'];

    //Области аттестации в которые включен вопрос
    public function testGroups(){
      return $this->belongsToMany('App\TestGroup');
    }

    //Ответы к вопросу
    public function answers(){
      return $this->hasMany('App\Answer');
    }

    // Билеты в которые включен вопрос
    public function papers(){
      return $this->belongsToMany('App\Paper');
    }
}
