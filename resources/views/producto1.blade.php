@extends('plantilla')
@section('titulo')
Producto
@endsection
@section('css')
producto
@endsection('css')
@section('main')
<style media="screen">
  .mensajeErrorP{
    color:red;
  }
</style>
  <div class="">
    <h1>{{$product->name}}</h1>
    <img id="imagenGran"class="imagen-producto" src="/storage/{{$product->images[0]->path}}" alt="">
    <p>${{$product->price}}</p>
    <p>Modelo: {{$product->model}}</p>
  </div>
  <div class="">
    <form class="" action="/" method="post">
      <h2>Seleccione el talle</h2>
      <select class="sizes__" name="">
        <option value="">Seleccione un talle</option>
        @foreach ($product->stocks as $stock)
          <option value="{{$stock->size->name}}">{{$stock->size->name}}</option>
        @endforeach
      </select>
      <input class="inputCantidad" type="number" name="">
      <div hidden class="mensajeErrorD">
        <p class="mensajeErrorP"></p>
      </div>
      <button type="submit" name="button">Comprar!</button>
    </form>
    @foreach ($product->stocks as $stock)
      <input hidden type="number" name="{{$stock->size->name}}" id="hidden{{$stock->size->name}}" value={{$stock->quantity}}>
    @endforeach
  </div>
@endsection
<script src="/js/controlStock.js" charset="utf-8"></script>
