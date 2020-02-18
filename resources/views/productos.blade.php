@extends('plantilla')
@section('titulo')
IL Nato Productos
@endsection
@section('css')
productos
@endsection('css')
@section('main')

  <div class="container">
    <h4 class="titulo">Filtrar productos por talle</h4>
    <div class="buscarTalle">
          @foreach ($sizes as $size)
            <a class="mostrarTalles {{ request()->is('productos/talle/' . $size->name) ? 'active' : '' }}" href="/productos/talle/{{$size->name}}">{{$size->name}}</a>
          @endforeach
    </div>
    <section class="productos">
        <div class="row">
          @foreach ($products as $product)
            <div class="padding col-6 col-md-4 col-lg-3">
              <div class="producto">
                {{-- Al id del carousel le concateno el id del producto que va a ser unico e irrepetible para que al cambiar la imagen
                de un carousel no cambie la de todos. --}}
                <div id="carouselExampleFade{{$product->id}}" class="carousel slide " data-ride="carousel" data-interval="false">
                  <div class="carousel-inner">
                    {{-- Este es el div ACTIVE del carousel, el que va a mostrarse al iniciar. ES OBLIGATORIO QUE EXISTA
                    para que fincione el carousel. Coloco la ruta de la imagen principal del producto, es decir, la de la posicion 0 --}}
                    <div class="carousel-item active">
                        <a href="/producto/{{$product->id}}"><img src="/storage/{{$product->images->first()->path}}" class="d-block w-100" alt="..."> {{-- ALTERNATIVA{{$product->images[0]->path}} --}}
                    </div>
                    {{-- Luego, debo crear un carousel item por imagen del producto por lo tanto recorro las imagenes del mismo y busco sus rutas --}}
                    @foreach ($product->images as $image)
                      {{-- @dd($image->path,$images->first()->path) --}}
                      @if ($image->path != $product->images->first()->path)
                        <div class="carousel-item">
                          <a href="/producto/{{$product->id}}"><img src="/storage/{{$image->path}}" class="d-block w-100" alt="...">
                        </div>
                      @endif

                    @endforeach
                  </div>

                  {{-- Aqui empiezan los botones de previous y next, debo ponerles como href el id de cada producto
                  ya que debe ser distinto para cada carousel. Ver explicacion linea 21 --}}
                  <a class="carousel-control-prev" href="#carouselExampleFade{{$product->id}}" role="button" data-slide="prev">
                    <span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleFade{{$product->id}}" role="button" data-slide="next">
                  <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <p class="marca">{{$product->brand->name}}</p>
                <p class="nombre wow fadeInDown">{{$product->name}}</p>
                @if($product->onSale==true && isset($product->discount))
                  @php
                    $onSalePrice = $product->price - $product->price/100*$product->discount; // precio * descuento / 100
                  @endphp
                  <span class="descuento">{{$product->discount}}% off</span> <!-- Pone un cartelito de descuento sobre la imagen del producto-->
                  <span class="precioAnterior">${{$product->price}}</span> <!-- Muestra precio anterior tachado -->
                  <span class="precio">${{$onSalePrice}}</span><p></p> <!-- Muestra el precio con el descuento incluido -->
                @else
                  <p class="precio">${{$product->price}}</p>
                @endif
                @if (Auth::user())
                  @if (Auth::user()->isAdmin == true)
                    <a class="ordenar" href="/editproduct/{{$product->id}}">Editar Producto</a>
                  @endif
                @endif


                {{-- En caso de que no haya stock en ningun talle del producto --}}

                {{-- Creo una variable que me va a servir como contador --}}
                @php
                $cantidadstock=0;
                @endphp

                {{-- Por cada stock del producto me fijo si la cantidad es mayor a 0 y en tal caso le sumo 1 a la variable creada --}}
                @foreach ($product->stocks as $stock)
                  @if ($stock->quantity > 0)
                    @php
                    $cantidadstock=$cantidadstock+1
                    @endphp
                  @endif
                @endforeach
{{-- @php
  dd($product->stocks);
@endphp --}}
                {{-- Si al final del foreach la cantidad de stock me da menor a 1 muestro que no hay stock y creo el boton solicitar stock, si me da  --}}
                @if ($cantidadstock == 0)
                  <p>No hay stock de este producto</p>
                @else
                  <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
                @endif

              </div>
            </div>
          @endforeach
        </div>
      </section>
    </div>

@endsection
