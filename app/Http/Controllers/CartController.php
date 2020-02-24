<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Stock;
use App\Size;
use Illuminate\Support\Facades\Auth;
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
    // buscamos el producto en particular
    $product = Product::find($request->id);
    // el talle en particular
    $size = Size::where('name','=',$request->size)->get();
    // la cantidad de stock disponible
    $cantidad_de_stock = Stock::where('product_id','=',$request->id)
      ->where('size_id', '=', $size[0]->id)
      ->get()[0]->quantity;

    // buscamos el carrito correspondiente a ese usuario
    // a ese producto y a ese talle
    $cart = Cart::where('user_id','=', Auth::user()->id)
      ->where('product_id','=',$product->id)
      ->where('size','=',$request->size)
      ->get();
    // Nos va a traer la cantidad de unidades pedidas
    // de un producto en particular
    // de un talle en particular
    if (isset($cart->first()->product_id)) {
      $stockEnCarrito = $cart->first()->quantity;
      // Para que la cantidad de stock en el carrito no supere a la cantidad de stock real
      $cantidad_de_stock = $cantidad_de_stock - $stockEnCarrito;
    }

    if ($request->quantity>$cantidad_de_stock) {
      return back();
    }
    else {
      // agregamos al cart el producto
      // Al agregar un producto instanciamos un nuevo carrito
      $cart = new Cart;
      // Los relacionamos
      $cart->product_id = $product->id;
      $cart->user_id = Auth::user()->id;
      // Instanciamos sus valores
      $cart->size = $request->size;
      $cart->quantity = $request->quantity;
      // Si el mismo usuario pide 2 veces el mismo producto (mismo id de producto y mismo talle)
      $repeat = Cart::where('user_id', '=', Auth::user()->id)
      ->where('product_id', '=', $product->id)
      ->where('size' , '=',$cart->size)
      ->get();
      if (isset($repeat[0])) {
        $repeat[0]->quantity = $repeat[0]->quantity + $cart->quantity;
        $repeat[0]->save();
        return redirect('/cart');
      }
      $cart->save();
      // devolvemos la vista del carrito
      return redirect('/cart');
    }
  }
  public function deleteFromCart(Request $request)
  {
    $cart = Cart::find($request->cart_id);
    $cart->delete();
    return redirect('/cart');
  }
  public function deleteEntireCart()
  {
    $carts = Cart::where('user_id','=',Auth::user()->id)->get();
    foreach ($carts as $cart) {
      $cart->delete();
    }
    return redirect('/cart');
  }

  public function bought(){
    $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
    // El foreach recorre el array de ids
    foreach ($carts as $cart) {
      // Obtengo el valor del talle y lo guardo en una variable (Elejido por la persona M S L XL)
      $size = Size::where('name','=',$cart->size)->get()->first();
      // Obtengo su objeto de tipo stock y lo guardo en una variable
      $stock = Stock::where('size_id','=',$size->id)
                    ->where('product_id','=',$cart->product_id)->get()->first();
      // Le restamos al stock de la talla elejida, la cantidad de objetos comprados
      $stock->quantity = $stock->quantity - $cart->quantity;
      // guardamos los cambios realizados en el stock
      $stock->save();
      // Por cada id, trae un carrito y lo elimina
      $cart->delete();
    }
    return redirect('/cart');
  }
  public function MP(){
    
  }
}
