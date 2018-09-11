<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{
  protected $fillable=['title', 'description_short', 'description', 'parent_id', 'create_by', 'modified_by'];

  //Области потомки
  public function children(){
    return $this->hasMany(self::class, 'parent_id');
  }

  // Вопросы включенные в область аттестации
  public function questions(){
    return $this->belongsToMany('App\Question');
  }

  // Билеты в области аттестации
  public function papers(){
    return $this->hasMany('App\Paper');
  }

}
