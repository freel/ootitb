<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable=['paper_index', 'category_id'];

    // Группа в которой находится билет
    public function category(){
      return $this->belongsTo('App\Category');
    }

    // Вопросы включенные в билет
    public function questions(){
      return $this->belongsToMany('App\Question');
    }

}
