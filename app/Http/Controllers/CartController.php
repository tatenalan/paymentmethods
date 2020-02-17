<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\Size;
class CartController extends Controller
{

  // Mostramos los carritos que pertenezcan al mismo usuario
  public function show()
  {
    $carts = Cart::where('user_id', '=', Auth::user()->id)->with('product')->get();
    return view('/cart',compact('carts'));
  }



  public function addToCart(Request $request)
  {
    $product = Product::find($request->id);
    $size = Size::where('name','=',$request->size)->get();
    $cantidad_de_stock = Stock::where('product_id','=',$request->id)->where('size_id', '=', $size[0]->id)->get()[0]->quantity;
    if ($request->quantity>$cantidad_de_stock) {
      return back();
    }
    else {
      // agregamos al cart el producto

      // devolvemos la vista del carrito
      return view('/cart');
    }
  }
}
