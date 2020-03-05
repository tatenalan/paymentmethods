<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <!-- ionicons JS --><script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <!-- ionicons JS --><script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <!-- Bootstrap JS --><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Bootstrap JS --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap JS --><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- ionicons CSS --><link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- FontAwesome CSS --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <!-- Google Fonts --><link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Oswald|Permanent+Marker&display=swap" rel="stylesheet">
    <!-- Icono del logo en pestana --><link rel="icon" type="image/png" href="/img/ilnato.png">
    <!-- Mi css General --><link rel="stylesheet" href="/css/general.css">
    <!-- Mi css hover lento --><link rel="stylesheet" type="text/css" href="/registro/css/main.css">
    <!-- Mi css Socialbar --><link rel="stylesheet" href="/css/socialbar.css">
    <!-- Mi css Header --><link rel="stylesheet" href="/css/header.css">
    <!-- Mi css Footer --><link rel="stylesheet" href="/css/footer.css">
    <!-- Mi css Animate --><link rel="stylesheet" href="/css/animate.css">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/@yield('css').css">

    @yield('scripts')
    {{-- Scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/funciones.js"></script>
    <script src="/js/wow.min.js"></script>
    <script>new WOW().init();</script>

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg" id="navbar">

        <div class="menu-principal collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link {{ request()->is('productos') ? 'active' : '' }} {{ request()->is('producto/*') ? 'active' : '' }} {{ request()->is('productos/*') ? 'active' : '' }}" href="/productos">Productos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('nosotros') ? 'active' : '' }}" href="/nosotros">Nosotros</a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('PreguntasFrecuentes') ? 'active' : '' }}" href="/PreguntasFrecuentes">Preguntas Frecuentes</a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('contacto') ? 'active' : '' }}" href="/contacto">Contactanos</a>
              </li>

            </ul>

        </div>

        <div class="logo">

          <a class="navbar-brand" href="/"><span class="logo-bebas">IL NATO</span><span class="logo-permanent"> Urban Store</span></a>

        </div>

        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="burger fas fa-bars"></i>
        </button>

        <div class="panel-usuario collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">

            @if (Auth::user())
              @if (Auth::user()->isAdmin == true)
                <a class="nav-link {{ request()->is('adminpanel') ? 'active' : '' }}" href="/adminpanel"><i class="fas fa-plus-circle"></i> Panel de Control</a>
              @endif
              <li>
                <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="/profile"><i class="fas fa-user"></i> {{auth::user()->name}} </a>
              </li>

              <li class="nav-item">
                <form class="" action="/logout" method="post">
                  @csrf
                  <button class="nav-link" type="submit" name="button"><i class="fas fa-sign-out-alt"></i><span> Cerrar Sesion</span></button>
                </form>
              </li>

            @else
              <li class="nav-item">
                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="/register"><i class="fas fa-user-plus"></i> Registrarse</a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</a>
              </li>

              {{-- <li class="nav-item"> --}}
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn-modal" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-sign-in-alt"></i> Iniciar Sesion
                </button>
              </li> --}}

            @endif

              <li class="nav-item">
                <a class="nav-link" href="/cart"><img class="bag-icon" src="/img/shopbag2.ico" alt=""></a>
              </li>

            </ul>

        </div>

      </nav>
      @if (request()->is('cart') || request()->is('producto/*'))
      <div id="promocion" class="promocion">
      <span class="textoPromocion">Promocion | Descuento por pago en efectivo al final de tu compra</span>
        <span id="showhidePromocion" class="close" onclick="hidePromocion()">X</span>
      </div>
      @endif
    </header>
    <main id="main">

      <div class="container">
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <ul>
                            @foreach (session()->get('success') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

      @yield('main')


    </main>

    <footer>

      <div class="copyright">
        <div>
          <span>Llamanos | </span><a class="contactanos" href="tel:+549-11-54126300" target="_blank"  class="icon-phone" data-toggle="tooltip" data-placement="right" data-original-title="Llamanos">1165966303</a>
        </div>
        <div>
          <span>Visitanos de Lunes a Sábado de 16hs a 20 hs | <a class="contactanos" href="https://www.google.com.ar/maps/place/A.+Rojas+36,+B1842ACB+Monte+Grande,+Buenos+Aires/@-34.816599,-58.4709892,17z/data=!3m1!4b1!4m5!3m4!1s0x95bcd1640042a561:0x2558d9dc766ab0a8!8m2!3d-34.816599!4d-58.4688005">A. Rojas 36 1er piso, Monte Grande</a></span>
        </div>
        <div>
          <span>Copyright ® IL Nato © <?php echo date("Y"); ?></span>
        </div>
        <div>
          <span>Programacion y diseño <a class="creador" href="https://www.linkedin.com/in/rodriguez-alan/">Taten</a> - <a class="creador" href="https://www.linkedin.com/in/juliancaminaur/">Jcaminaur</a></span>
        </div>
      </div>
      <div class="padre">
    </footer>


        <div class="wow animated bounceInRight socialBar">
          <ul id="socialBar">
            <span id="showhide" class="close" onclick="hideSocialBar()">X</span>
            {{-- <li><button id="showhide" class="closebar" onclick="hideSocialBar()">X</button></li> --}}
            <li><a href="https://api.whatsapp.com/send?phone=5491165966303&text=Hola, estoy contactandolos desde IL Nato Tienda Online" target="_blank" class="icon-whatsapp" data-toggle="tooltip" data-placement="right" data-original-title="Consulta por Whatsapp!"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="tel:+549-11-54126300" target="_blank"  class="icon-phone" data-toggle="tooltip" data-placement="right" data-original-title="Llamanos"><ion-icon name="call"></ion-icon></a></li>
            <li><a href="mailto:info@ilnato.com" class="icon-mail"><ion-icon name="mail"></ion-icon></a></li>
            <li><a href="https://www.facebook.com/Il-nato-197855791106400/" target="_blank" class="icon-facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="https://www.instagram.com/il_nato/" target="_blank" class="icon-instagram"><ion-icon class="logo-instagram" name="logo-instagram"></ion-icon></a></li>
          </ul>
        </div>


      </div>

      <script src="/js/wow.min.js"></script>
      <script>new WOW().init();</script>
  </body>
</html>
