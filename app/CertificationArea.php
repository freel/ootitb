<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificationArea extends Model
{
    protected $fillable=['title', 'parent_id', 'description', 'create_by', 'modified_by'];

    //Области потомки
    public function children(){
      return $this->hasMany(self::class, 'parent_id');
    }

    // Вопросы включенные в область аттестации
    public function questions(){
      return $this->belongsToMany('App\Question');
    }
}