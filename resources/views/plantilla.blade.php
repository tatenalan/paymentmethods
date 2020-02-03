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
    <!-- Mi css hover lento --><link rel="stylesheet" type="text/css" href="registro/css/main.css">
    <!-- Mi css Socialbar --><link rel="stylesheet" href="/css/socialbar.css">
    <!-- Mi css Header --><link rel="stylesheet" href="/css/header.css">
    <!-- Mi css Footer --><link rel="stylesheet" href="/css/footer.css">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/@yield('css').css">

    @yield('scripts')
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
                <a class="nav-link" href="/productos">Productos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/nosotros">Nosotros</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/FAQs">Ayuda</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/contacto">Contactanos</a>
              </li>

            </ul>

        </div>

        <div class="logo">

          <a class="navbar-brand" href="/#main"><span class="logo-bebas">IL NATO</span><span class="logo-permanent"> Urban Store</span></a>

        </div>

        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="burger fas fa-bars"></i>
        </button>

        <div class="panel-usuario collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">

            @if (Auth::user())
              @if (Auth::user()->isAdmin == true)
                <a class="nav-link" href="/controlpanel"><i class="fas fa-plus-circle"></i> Panel de Control</a>
              @endif
              <li>
                <a class="nav-link" href="/profile"><i class="fas fa-user"></i> {{auth::user()->name}} </a>
              </li>

              <li class="nav-item">
                <form class="" action="/logout" method="post">
                  @csrf
                  <button class="nav-link" type="submit" name="button"><i class="fas fa-sign-out-alt"></i><span> Cerrar Sesion</span></button>
                </form>
              </li>

            @else
              <li class="nav-item">
                <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> Registrarse</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</a>
              </li>

              {{-- <li class="nav-item"> --}}
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn-modal" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-sign-in-alt"></i> Iniciar Sesion
                </button>
              </li> --}}

            @endif

              <li class="nav-item">
                <a class="nav-link" href="#clientes"><img class="bag-icon" src="/img/shopbag2.ico" alt=""></a>
              </li>

            </ul>

        </div>

      </nav>
    </header>
    <main>


      @yield('main')

      <!-- Modal -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form class="contact100-form validate-form" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
              <div class="modal-content">
                    @csrf

                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">INICIAR SESION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="wrap-input100 validate-input" data-validate = "Ingresa un email valido: ex@abc.xyz">
            					<label class="label-input100" for="email">Email *</label>
            					<input id="correo" class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Ingresa tu email..." required autocomplete="email" autofocus>
            					<span class="focus-input100"></span>
                      @error('email')
                        <p class="errorForm">{{ $message }}</p>
                      @enderror
            				</div>

                    <div class="wrap-input100 validate-input" data-validate="">
            					<label class="label-input100" for="password">Contraseña *</label>
            					<input id="pass" class="input100" type="password" name="password" value="" placeholder="Ingresa tu contraseña..." required autocomplete="current-password">
            					<span class="focus-input100"></span>
                      @error('password')
                        <p class="errorForm">{{ $message }}</p>
                      @enderror
            				</div>

                    <small class="form-text text-muted">No tienes una cuenta? <a href="/register"> Crear cuenta</a></small>
                    @if (Route::has('password.request'))
                      <small class="form-text text-muted">Olvidaste tu password? <a href="{{ route('password.request') }}"> Recuperar password</a></small>
                    @endif

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">INGRESAR</button>
                  </div>

              </div>

            </form>
          </div>
        </div> --}}
    </main>

    {{-- <div class="toTop">
      <a onclick="scrollToTop()" class="toTop" title="Go to top"><i class="fas fa-angle-double-up"></i></a>
    </div> --}}

    <footer>
      <div class="copyright">
        <div>
          <span>Copyright ®</span>
        </div>
        <div>
          <span>IL Nato © 2020</span>
        </div>
        <div>
          <span>Programacion y diseño <a class="creador" href="https://www.linkedin.com/in/rodriguez-alan/">Taten</a> - <a class="creador" href="https://www.linkedin.com/in/juliancaminaur/">Jcaminaur</a></span>
        </div>
      </div>
      <div class="padre">
    </footer>


        <div  class="socialBar">
          <button id="showhide" class="closebar" onclick="hideSocialBar()">X</button>
          <ul id="socialBar">
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
