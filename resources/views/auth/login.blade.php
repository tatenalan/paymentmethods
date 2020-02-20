@extends('plantilla')
@section('titulo')
Login
@endsection
@section('css')
form
@endsection('css')
@section('scripts')
  {{-- registro/login --}}
<!--===============================================================================================-->
	{{-- <link rel="stylesheet" type="text/css" href="registro/vendor/bootstrap/css/bootstrap.min.css"> --}}
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registro/css/util.css">
	<link rel="stylesheet" type="text/css" href="registro/css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="registro/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="registro/vendor/bootstrap/js/popper.js"></script>
	<script src="registro/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="registro/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="registro/vendor/daterangepicker/moment.min.js"></script>
	<script src="registro/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="registro/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="registro/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
@endsection('scripts')

@section('main')
  <div class="container-contact100">
  		<div class="wrap-contact100">
  			<form class="contact100-form validate-form" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
          @csrf
  				<span class="contact100-form-title">
  					Ingresar
  				</span>

  				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
  					<label class="label-input100" for="email">Email *</label>
  					<input id="email" type="email" class="input100" placeholder="correo@dominio.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  					<span class="focus-input100"></span>
            @error('email')
              <p class="centrado errorForm">{{ $message }}</p>
            @enderror
  				</div>

          <div class="wrap-input100 validate-input" data-validate="">
  					<label class="label-input100" for="password">Contraseña *</label>
  					<input id="password" type="password" class="input100" placeholder="Ingresa tu contraseña ..." name="password" required autocomplete="current-password">
  					<span class="focus-input100"></span>
            @error('password')
              <p class="centrado errorForm">{{ $message }}</p>
            @enderror
  				</div>

          <div class="field-group remember-me">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="recordarme" for="remember-me"><small class="text-muted">Recordarme</small></label>
          </div>

          <br><br><small class="form-text text-muted">Los valores con un * son obligatorios.</small>

  				<div class="container-contact100-form-btn">
  					<button type="submit" class="contact100-form-btn">Ingresar</button>
  				</div>



  				{{-- <div class="contact100-form-social flex-c-m">
  					<a href="register/#" class="contact100-form-social-item flex-c-m bg1 m-r-5">
  						<i class="fa fa-facebook-f" aria-hidden="true"></i>
  					</a>

  					<a href="register/#" class="contact100-form-social-item flex-c-m bg2 m-r-5">
  						<i class="fa fa-twitter" aria-hidden="true"></i>
  					</a>

  					<a href="register/#" class="contact100-form-social-item flex-c-m bg3">
  						<i class="fa fa-youtube-play" aria-hidden="true"></i>
  					</a>
  				</div> --}}
  			</form>

  			<div class="contact100-more flex-col-c-m" style="background-image: url('/img/nikeairmax.jpg');">
  			</div>
  		</div>
  	</div>
@endsection
