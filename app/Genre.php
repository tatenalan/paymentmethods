<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  public $guarded = [];

  public function productsByGenre()
  {
    return $this->hasMany("App\Product", 'genre_id');
  }

}
