@extends('plantilla')
@section('titulo')
IL Nato Cart
@endsection
@section('css')
Productos
@endsection('css')
@section('main')
  <h1>Cart</h1>
  <form class="cart" action="/buy" method="post">
    @csrf
    <button type="submit" name="button">Comprar!</button>
  </form>
@endsection
