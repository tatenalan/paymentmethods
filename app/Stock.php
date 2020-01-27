<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  public $guarded = [];

  public function product()
  {
    return $this->belongsTo("App\Product", "product_id"); // Recordar poner App con A mayuscula
  }

  public function color()
  {
    return $this->belongsTo("App\Color", "color_id"); // Recordar poner App con A mayuscula
  }

  public function size()
  {
    return $this->belongsTo("App\Size", "size_id"); // Recordar poner App con A mayuscula
  }

}
