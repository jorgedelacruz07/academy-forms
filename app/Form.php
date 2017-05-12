<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  public function area(){
    return $this->belongsTo('App\Area');
  }
}
