@extends('plantilla')
@section('titulo')
il Nato Carrito
@endsection
@section('css')
cart
@endsection



@section('main')

<div class="container">
  <h5 class="centrado titulo">Carrito de compras</h5>

  <div class="productos">
  {{-- Cada producto que se agregue va a ser un carrito nuevo, en este array los recorremos y pedimos sus datos --}}
   @forelse ($carts as $cart)
    @php
       // Estas variables corresponden al $cart por ende se definen dentro del foreach
      $size = $cart->size;
    @endphp


    <div class="producto">
      <div class="img">
        {{-- Como imagen del producto en el carrito utilizo la primera --}}
        <img src="/storage/{{$cart->product->images[0]->path}}" alt="">
      </div>
      <div class="product-info">
        <div class="name">
          <p>{{$cart->product->name}}, {{$cart->product->genre->name}}</p>
        </div>
        <div class="cat-gen-size-quan">
          <p>
            {{$cart->product->brand->name}},
            talle: {{$cart->size}}
            cantidad: {{$cart->quantity}}
          </p>

        </div>
         @if ($cart->product->onSale==true && isset($cart->product->discount))
          @php
            $onSalePrice = $cart->product->price - $cart->product->price/100*$cart->product->discount;
            // precio * descuento / 100
          @endphp
          <span class="descuento">{{$cart->product->discount}}% off</span>
          <!-- Pone un cartelito de descuento sobre la imagen del producto-->
          <span class="precioAnterior">${{$cart->product->price}}</span>
          <!-- Muestra precio anterior tachado -->
          <span class="">${{$onSalePrice}}</span>
          <!-- Muestra el precio con el descuento incluido -->
          <p class="">Total: ${{$onSalePrice * $cart->quantity}}</p>
        @else
          <p class="">Precio: ${{$cart->product->price}}</p>
          <p class="">Total: ${{$cart->product->price * $cart->quantity}}</p>
        @endif
      </div>

      {{-- Para cada producto agregado al carrito tenemos un boton eliminar que busca su id y lo elimina por post --}}
      <form class="" action="/deleteFromCart" method="post">
        @csrf
        {{-- Tanto la label como el button necesitan un id unico para que funcione adecuadamente --}}
        <label for="file-upload{{$cart->id}}" class="sacar-carrito">
          <i class="far fa-trash-alt"></i>
        </label>
        <input class="producto_id" hidden type="text" name="cart_id" value="{{$cart->id}}">
        <button class='' id="file-upload{{$cart->id}}" style='display: none;' type="submit">Sacar del Carrito</button>
      </form>
    </div> {{-- producto --}}

  {{-- si no hay productos en el carrito --}}
  @empty

      <h2 class="centrado">Tu Carrito está vacío</h2>
      <i class="centrado fas fa-shopping-basket"></i>

  @endforelse
  </div> {{-- productos --}}


  {{-- Si hay productos en el carrito --}}
  @if ($carts->count())

    @php
      $total = 0;
    @endphp

    {{-- Calculamos el total de la compra sumando el precio total de cada producto (precio por cantidad) --}}
    @foreach ($carts as $cart)
      {{-- Si el producto tiene descuento multiplico el precio en descuento por la cantidad --}}
      @if ($cart->product->onSale==true && isset($cart->product->discount))
        @php
          $total = $total + $onSalePrice * $cart->quantity;
        @endphp
      {{-- Si no tiene descuento multiplico el precio regular por la cantidad --}}
      @else
        @php
          $total = $total + $cart->product->price * $cart->quantity;
        @endphp
      @endif
    @endforeach

    <div class="linea-separadora">

    </div>

    <div class="total">
      <p>Total de la compra: $ {{$total}}</p>

      {{-- Creamos un boton de compra que recolecta los id de los carritos del usuario --}}
      <form action="/successfullPurchase" method="post">
        @csrf

        {{-- Foreach para recorrer cada carrito y obtener su id--}}
        @foreach ($carts as $cart)
          {{-- Por cada carrito creamos un input hidden que va a tener como valor el id del carrito --}}
          {{-- RECORDAR LOS CORCHETES EN EL NAME PARA QUE SE ENVIE COMO ARRAY --}}
          <input type="text" hidden name="id[]" value="{{$cart->id}}">
        @endforeach

          <button class="btn btn-ordenar" type="submit">Realizar Compra</button>
        {{-- @endif --}}

      </form>
        <form class="" action="/deleteEntireCart" method="post">
          @csrf
          <button type="submit" name="button">Vaciar Carrito</button>
        </form>
    </div>
  </div>
  @endif
@endsection
