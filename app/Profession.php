<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
  /**
  * User profession
  */
  public function user(){
    return $this->hasMany('App\User');
  }
}
