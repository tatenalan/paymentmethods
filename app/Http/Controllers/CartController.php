<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\Size;
class CartController extends Controller
{



  public function addToCart(Request $request){
    $product = Product::find($request->id);
    $size = Size::where('name','=',$request->size)->get();
    $cantidad_de_stock = Stock::where('product_id','=',$request->id)->where('size_id', '=', $size[0]->id)->get()[0]->quantity;
    if ($request->quantity>$cantidad_de_stock) {
      return back();
    }
    else {
      return view('/cart');
    }
  }
}
