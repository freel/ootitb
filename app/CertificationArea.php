<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificationArea extends Model
{
    protected $fillable=['title', 'parent_id', 'description', 'create_by', 'modified_by'];
    
    //Get children certification_area
    public function children(){
      return $this->hasMany(self::class, 'parent_id');
    }
}
