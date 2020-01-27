<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

  public $guarded = [];

  public function stocks()
  {
    return $this->hasMany("App\Stock", "size_id"); // Recordar poner App con A mayuscula
  }
  
}
