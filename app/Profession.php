<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'description',
  ];

  /**
  * User profession
  */
  public function user(){
    return $this->hasMany('App\User');
  }
}
