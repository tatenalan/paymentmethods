@extends('plantilla')
@section('titulo')
Producto
@endsection
@section('css')
productos
@endsection('css')
@section('main')
  <div class="container">
    <section class="producto">

      <section class="imagenes">
        <div class="imagen-principal">
          <img class="imagen-principal imagen_grande" src="/storage/{{$product->images[0]->path}}" alt="">
          @if ($product->onSale==true && isset($product->discount))
            <span class="descuento"> {{$product->discount}} % off</span> <!-- Pone un cartelito de descuento sobre la imagen del producto-->
            @endif
        </div>
        <div class="imagenes-pequeñas">
          @foreach ($product->images as $image)
            <img class="imagen-producto-peque"src="/storage/{{$image->path}}" alt="">
          @endforeach
        </div>
      </section>

      <section class="informacion">

        <div class="fila-uno">
        <h3 class="">{{$product->brand->name}}</h3>
        <h4>{{$product->name}}</h4>
        @if ($product->onSale==true && isset($product->discount))
              @php
                $onSalePrice = $product->price - $product->price/100*$product->discount; // precio * descuento / 100
              @endphp
              <span class="precioAnterior">${{$product->price}}</span> <!-- Muestra precio anterior tachado -->
              <span class="precio">${{$onSalePrice}}</span><p></p> <!-- Muestra el precio con el descuento incluido -->
            @else
              <p class="precio">${{$product->price}}</p>
            @endif
        </div>

        <div class="detalles-compra">
          <form class="detalles-compra" action="/addToCart" class="ordenar" method="post">
          @csrf
          <div class="detalles">
              <label for="">Talle:</label>
              <select class="sizes__ talles" name="size">
                @foreach ($product->stocks as $stock)
                  <option value="{{$stock->size->name}}">{{$stock->size->name}}</option>
                @endforeach
              </select>
              <label>Cantidad:</label>
              <input class="cantidad inputCantidad" type="number" name="quantity" min="1" max="100" step="1" value="1">
              <input type="number" hidden name="id" value="1">
            </div>
            <div hidden class="divDeError">
              <p class="mensajeError"></p>
            </div>

            <div class="compra">
              <button type="submit" class="btn btn-ordenar buttonSubmit">Ordenar</button>
            </div>
          </form>
          {{-- Hacemos un foreach por cada valor de stock de ese producto en particular--}}
          @foreach ($product->stocks as $stock)
            {{-- con $stock traemos el nombre del talle relacionado con ese stock en particular 34,35--}}
            <input hidden type="number" name="{{$stock->size->name}}" id="hidden{{$stock->size->name}}" value={{$stock->quantity}}>
          @endforeach
          @if (Auth::user() && Auth::user()->isAdmin == true)

          <div class="edicion">
            <form class="" action="/editproduct/{{$product->id}}" method="get">
              @csrf
              <button type="submit" class="btn btn-ordenar">Editar producto</button>
            </form>
            <form class="" onclick="confirmar()" action="/delete/product/{{$product->id}}" method="post">
              @csrf
              <button type="submit" class="btn btn-ordenar">Eliminar producto</button>
            </form>
          </div>
        @endif
        </div>

      </section>

    </section>
  </div>

@endsection
<script src="/js/controlStock.js" charset="utf-8"></script>
