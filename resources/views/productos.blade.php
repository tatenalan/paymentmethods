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
              <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/img/producto5b.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/img/producto5c.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/img/producto5d.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                  <span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
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
                  <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <a href="/product/{{$product->id}}"><img src="/img/{{$product->images[0]->path}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        {{-- <a href="/product/{{$product->id}}"><img src="/storage/{{$product->images[1]->path}}" class="d-block w-100" alt="..."> --}}
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                      <span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
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
