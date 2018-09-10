<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

      /**
      * Role users
      */
      public function users(){
        return $this->belongsToMany('App\User');
      }
}
