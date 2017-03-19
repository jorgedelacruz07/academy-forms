<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  public function forms(){
    return $this->hasMany('App\Form');
  }
}
