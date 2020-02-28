@extends('plantilla')
@section('titulo')
IL Nato Producto
@endsection
@section('css')
productos
@endsection('css')
@section('main')

  {{-- Puede ocurrir que no haya stock en ningun talle del producto --}}
  {{-- Para determinar eso creo una variable que me va a servir como contador --}}
  @php
  $cantidadstock=0;
  @endphp

  {{-- Por cada stock del producto me fijo si la cantidad es mayor a 0 y en tal caso le sumo 1 a la variable contador --}}
  @foreach ($product->stocks as $stock)
    @if ($stock->quantity > 0)
      @php
      $cantidadstock=$cantidadstock+1
      @endphp
    @endif
  @endforeach


  <div class="container">
    <div class="links-ayuda">
      <a href="/productos">Productos</a> >> <a href="{{ URL::previous() }}">Volver</a>
    </div>
    <section class="producto">
      <section class="imagenes">
        <div class="imagen-principal">

          {{-- Si no hay stock de ningun talle, muestro las fotos con opacidad --}}
          @if ($cantidadstock == 0)
            <img class="opacity imagen-principal imagen_grande" src="/storage/{{$product->images[0]->path}}" alt="">
          @else
            <img class="imagen-principal imagen_grande" src="/storage/{{$product->images[0]->path}}" alt="">
          @endif

          {{-- <img class="imagen-principal imagen_grande" src="/storage/{{$product->images[0]->path}}" alt=""> --}}
          @if ($product->onSale==true && isset($product->discount))
            <span class="descuento"> {{$product->discount}} % off</span> <!-- Pone un cartelito de descuento sobre la imagen del producto-->
            @endif
        </div>
        <div class="imagenes-pequeñas">
          @foreach ($product->images as $image)
            @if ($cantidadstock == 0)
              <img class="opacity imagen-producto-peque"src="/storage/{{$image->path}}" alt="">
            @else
              <img class="imagen-producto-peque"src="/storage/{{$image->path}}" alt="">
            @endif
          @endforeach
        </div>
      </section>

      <section class="informacion">

        <div class="detalles-producto">
          <h3 class="">{{$product->brand->name}}</h3>
          <h4>{{$product->name}}</h4>
          <h5>{{$product->genre->name}}</h5>
          @if ($product->onSale==true && isset($product->discount))
            @php
              $onSalePrice = $product->price - $product->price/100*$product->discount; // precio * descuento / 100
            @endphp
            <span class="precioAnterior">${{$product->price}}</span> <!-- Muestra precio anterior tachado -->
            <span class="precio">${{$onSalePrice}}</span><p></p> <!-- Muestra el precio con el descuento incluido -->
          @else
            <p class="precio">${{$product->price}}</p>
          @endif

            {{-- Si al final del foreach la cantidad de stock me da menor a 1 muestro que no hay stock y creo el boton solicitar stock, si me da  --}}
            @if ($cantidadstock == 0)
              <h6 class="sindisponibilidad">SIN STOCK</h6>
            @else
              <h6 class="disponibilidad">EN STOCK</h6>
            @endif


          @if (isset($product->model))
            <h6>SKU: {{$product->model}}</h6>
          @endif
        </div>

        <div class="detalles-compra">
          <form class="detalles-compra" action="/addToCart" class="ordenar" method="post">
          @csrf
          <div class="detalles">
              <label for="">Talle:</label>
              <select class="sizes__ talles" name="size">
                @foreach ($product->stocks as $stock)
                  <option value="{{$stock->size->name}}">{{$stock->size->name}}@if ($stock->quantity == 0) Sin stock @elseif ($stock->quantity < 3) Pocas unidades @endif</option>
                @endforeach
              </select>
              <label>Cantidad:</label>
              <input class="cantidad inputCantidad" type="number" name="quantity" min="1" max="100" step="1" value="1">
              {{-- Este input es necesario para enviar el id del producto en la request --}}
              <input type="number" hidden name="id" value="{{$product->id}}">
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
        <p>No hay stock del talle que buscas??</p>
        <div class="solicitar-stock">
          <a href="https://api.whatsapp.com/send?phone=5491165966303&text=Hola, estoy contactandolos desde IL Nato Tienda Online para solicitarles stock del producto {{$product->model}}" target="_blank" class="solicitar-stock" data-toggle="tooltip" data-placement="right" data-original-title="Consulta por Whatsapp!">Click aqui para solicitar Stock por Whatsapp <ion-icon class="solicitar-stock" name="logo-whatsapp"></ion-icon></a></li>
        </div>

        {{-- Modal tabla de talles --}}

        <!-- Button trigger modal -->
        <button class="botontabladetalles" data-toggle="modal" data-target="#exampleModal">
          Ver tabla de talles
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Tabla de talles</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img class="tabladetalles" src="/img/tabladetalles.jpeg" alt="">
              </div>
              {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div> --}}
            </div>
          </div>
        </div>



        <div class="separador">

        </div>

        <div class="redes">
          <ul class="redes">
            <li><a href="https://api.whatsapp.com/send?phone=5491165966303&text=Hola, estoy contactandolos desde IL Nato Tienda Online" target="_blank" class="i-whatsapp" data-toggle="tooltip" data-placement="right" data-original-title="Consulta por Whatsapp!"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="tel:+549-11-54126300" target="_blank"  class="i-phone" data-toggle="tooltip" data-placement="right" data-original-title="Llamanos"><ion-icon name="call"></ion-icon></a></li>
            <li><a href="mailto:info@ilnato.com" class="i-mail"><ion-icon name="mail"></ion-icon></a></li>
            <li><a href="https://www.instagram.com/il_nato/" target="_blank" class="i-instagram"><ion-icon class="logo-instagram" name="logo-instagram"></ion-icon></a></li>
          </ul>
        </div>

      </section>

    </section>
  </div>

@endsection
<script src="/js/controlStock.js" charset="utf-8"></script>
