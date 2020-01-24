<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <!-- Mi css Header --><link rel="stylesheet" href="/css/main.css">

    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/@yield('css').css">

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img class="logo" src="/img/Logo3.png" alt = "Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="barra collapse navbar-collapse" id="navbarNav">
          <!--dropdown-->
          <div class="dropdown dropdown-menu-center">
            <a class="btn dropdown-toggle dropdown-productos" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item oferta" href="ofertas">Ofertas</a>

              <a class="dropdown-item" href="/remeras">Remeras</a>
              <a class="dropdown-item" href="/camisas">Camisas</a>
              <a class="dropdown-item" href="/jeans">Jeans</a>
              <a class="dropdown-item" href="/buzos">Buzos</a>
              <a class="dropdown-item" href="/camperas">Camperas</a>
              <a class="dropdown-item" href="/accesorios">Accesorios</a>

            </div>
          </div>
          <!--dropdown-->
        <form class="search-bar" action="/search" method="get">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar producto" name="search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-outline-ligth" type="button"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/nosotros">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contactanos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ayuda">Ayuda</a>
            </li>
          </ul>

          <ul class="navbar-nav usuario">
            @if (Auth::user())
            <li class="nav-item">
              @if (Auth::user()->isAdmin == true)
              <a class="nav-link" href="/addProduct"><i class="fas fa-plus-circle"></i> Add Product</a>
              @endif
            </li>
            <li>
              <a class="nav-link" href="/profile"><i class="fas fa-user"></i> {{auth::user()->first_name}} </a>
            </li>
            <li>
                <form class="" action="/logout" method="post">
                  @csrf
                  <p class="cerrar-sesion-responsive"><button class="nav-link" type="submit" name="button"><i class="fas fa-sign-out-alt"></i><span> Cerrar Sesion</span></button></p>
                </form>
            </li>
            @else
                  <li class="nav-item">
                    <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> Registrarse</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</a>
                  </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div> <!-- aqui cierra el collapse div -->
      </nav>
    </header>
    <main>
      @yield('main')
    </main>
    <footer>
      <div class="linea-separadora">

      </div>
      <div class="cuerpo-footer centrado">
        <div class="row">
          <div class="col-xs-12 col-md-4 col-lg-4">
            <h5>AYUDA</h5>
            <ul>
              <li><a href="ayuda">Como comprar</a> |</li>
              <li><a href="ayuda">Guia de talles</a> |</li>
              <li><a href="ayuda">Cambios y devoluciones</a> |</li>
              <li><a href="ayuda">FAQ</a> |</li>
              <li><a href="nosotros">Donde estamos</a> </li>
            </ul>
          </div>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <h5>NUESTRAS REDES</h5>
            <ul>
              <li><ion-icon class="rounded-circle border" name="logo-facebook"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-googleplus"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-twitter"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-linkedin"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-dribbble"></ion-icon></li>
            </ul>
          </div>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <h5>NUESTRO NEWSLETTER</h5>
            <form class="" target="_self" id="mG61Hd" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSfdRScbGaoPbus19bHsrNOhRr-_-d3Wd9ta8bLtzfTOeZ6a6A/formResponse" method="post">
              {{csrf_field()}}
              <div class="input-group">
                <input type="email" class="newsletter form-control" placeholder="Dejanos tu email" name="entry.1296773286">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-outline-ligth" type="button"><i class="fas fa-at"></i></button>
                </div>
              </div>
                <small class="form-text text-muted">Enterate de todo.</small>
            </form>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div>
          <span>All rights reserved   ®</span>
        </div>
        <div>
          <span>Oklahoma © 2019</span>
        </div>
        <div class="">
          <span>diseño por <a class="creador" href="#">nombre</a></span>
        </div>
      </div>
    </footer>
      <div class="padre">

        <div class="socialBar">
          <ul>
            <li><a href="https://api.whatsapp.com/send?phone=5491158291281&text=Hola, estoy contactandolos desde el sitio web para recibir mas informacion" target="_blank" class="icon-whatsapp" data-toggle="tooltip" data-placement="right" data-original-title="Consulta por Whatsapp!"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="tel:+549-11-58291281" target="_blank"  class="icon-phone" data-toggle="tooltip" data-placement="right" data-original-title="Llamanos"><ion-icon name="call"></ion-icon></a></li>
            <li><a href="mailto:info@laresdecanning.com" class="icon-mail"><ion-icon name="mail"></ion-icon></a></li>
            <li><a href="http://www.facebook.com/laresdecanning" target="_blank" class="icon-facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="http://www.Instagram.com/laresdecanning" target="_blank" class="icon-instagram"><ion-icon class="logo-instagram" name="logo-instagram"></ion-icon></a></li>
          </ul>
        </div>

      </div>
  </body>
</html>
