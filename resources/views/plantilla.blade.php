<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <!-- ionicons JS --><script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <!-- ionicons JS --><script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <!-- ionicons CSS --><link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- FontAwesome CSS --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <!-- Bootstrap JS --><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Bootstrap JS --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap JS --><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- ionicons JS --><script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <!-- ionicons JS --><script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <!-- Bootstrap CSS --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Fonts --><link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Oswald|Permanent+Marker&display=swap" rel="stylesheet">
    <!-- Mi css Socialbar --><link rel="stylesheet" href="/css/socialbar.css">
    <!-- Icono del logo en pestana --><link rel="icon" type="image/png" href="/img/ilnato.png" />
    <!-- Mi css General --><link rel="stylesheet" href="/css/general.css">
    <!-- Mi css General --><link rel="stylesheet" href="/css/nav.css">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/@yield('css').css">

    {{-- Scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/funciones.js"></script>

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg">

        <div class="menu-principal collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" id='quienes-somos-nav' href="#quienes-somos">Productos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#nuestro-equipo" id='nuestro-equipo-nav'>Nosotros</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#clientes" id='clientes-nav'>Ayuda</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#contacto" id="contacto-nav">Contactanos</a>
              </li>

            </ul>

        </div>

        <div class="logo">

          <a class="navbar-brand" href="/"><span class="logo-bebas">IL NATO</span><span class="logo-permanent"> Urban Store</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        </div>

        <div class="panel-usuario collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" id='quienes-somos-nav' href="#quienes-somos">Registrarse</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#nuestro-equipo" id='nuestro-equipo-nav'>Iniciar Sesion</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#clientes" id='clientes-nav'><img class="bag-icon" src="/img/shopbag2.ico" alt=""></a>
              </li>

            </ul>

        </div>

      </nav>
    </header>
    <main>
      @yield('main')
    </main>

    <div class="toTop">
      <a onclick="scrollToTop()" class="toTop" title="Go to top"><i class="fas fa-angle-double-up"></i></a>
    </div>

    <footer>

    </footer>

    <div class="padre">

        <div class="socialBar">
          <ul>
            <li><a href="https://api.whatsapp.com/send?phone=5491165966303&text=Hola, estoy contactandolos desde IL Nato Tienda Online" target="_blank" class="icon-whatsapp" data-toggle="tooltip" data-placement="right" data-original-title="Consulta por Whatsapp!"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="tel:+549-11-54126300" target="_blank"  class="icon-phone" data-toggle="tooltip" data-placement="right" data-original-title="Llamanos"><ion-icon name="call"></ion-icon></a></li>
            <li><a href="mailto:contacto@ilnato.com" class="icon-mail"><ion-icon name="mail"></ion-icon></a></li>
            <li><a href="https://www.facebook.com/crossoverlatam" target="_blank" class="icon-facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="https://www.instagram.com/il_nato/" target="_blank" class="icon-instagram"><ion-icon class="logo-instagram" name="logo-instagram"></ion-icon></a></li>
          </ul>
        </div>

      </div>
  </body>
</html>
