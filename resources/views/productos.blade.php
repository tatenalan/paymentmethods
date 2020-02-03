@extends('plantilla')
@section('titulo')
IL Nato Home
@endsection
@section('css')
Productos
@endsection('css')
@section('main')

  <div class="container">
    <section class="productos">
        <div class="row">
          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/producto5a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/producto2a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

            <div class="padding col-6 col-md-4 col-lg-3">
              <div class="producto">
              <a href="/"><img src="/img/producto3a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
            <a href="/"><img src="/img/producto3a.jpg" style="" class="img-productos"></a>
            <p class="marca">Zapatilla</p>
            <p class="nombre">Yeezy</p>
            <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
            @if (Auth::user()->isAdmin == true)
              <a class="ordenar" href="/">Editar Producto</a>
            @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/producto5a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/producto5a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/producto5a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/producto5a.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
                <a href="/"><img src="/img/1.jpg" style="" class="img-productos"></a>
                <p class="marca">Zapatilla</p>
                <p class="nombre">Yeezy</p>
                <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
                @if (Auth::user()->isAdmin == true)
                  <a class="ordenar" href="/">Editar Producto</a>
                @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/a1.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/1.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/">Editar Producto</a>
              @endif
            </div>
          </div>

          <div class="padding col-6 col-md-4 col-lg-3">
            <div class="producto">
              <a href="/"><img src="/img/a1.jpg" style="" class="img-productos"></a>
              <p class="marca">Zapatilla</p>
              <p class="nombre">Yeezy</p>
              <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
            </div>
          </div>
          @foreach ($products as $product)
            <div class="padding col-6 col-md-4 col-lg-3">
              <div class="producto">
                @if (count($product->images)>1)
                <div class="thecard">
                  <figure>
                    <a href="/"><img src="/storage/{{$product->images[0]->path}}" class="img-productos"></a>
                  </figure>
                  <figure>
                    <a href="/"><img src="/storage/{{$product->images[1]->path}}" class="img-productos"></a>
                  </figure>
                </div>
                @else
                  <a href="/"><img src="/storage/{{$product->images[0]->path}}" style="" class="img-productos"></a>
                @endif
              </div>
              <div class="producto">
                <p class="marca">{{$product->brand->name}}</p>
                <p class="nombre">{{$product->name}}</p>
                @if (Auth::user()->isAdmin == true)
                  <a class="ordenar" href="/editproduct/{{$product->id}}">Editar Producto</a>
                @endif
                <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    </div>

@endsection
