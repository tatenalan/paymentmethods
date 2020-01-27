<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $guarded = [];

  public function carts()
  {
    return $this->hasMany("App\Cart", "product_id"); // Recordar poner App con A mayuscula
  }

  public function images()
  {
    return $this->hasMany("App\Image", "product_id"); // Recordar poner App con A mayuscula
  }

  public function stocks()
  {
    return $this->hasMany("App\Stock", "product_id");
  }

  public function genre()
  {
    return $this->belongsTo("App\Genre", "genre_id"); // Recordar poner App con A mayuscula
  }


  public function category()
  {
    return $this->belongsTo("App\Category", "category_id");
  }

  public function brand()
  {
    return $this->belongsTo("App\Brand", "brand_id"); // Recordar poner App con A mayuscula
  }

}
