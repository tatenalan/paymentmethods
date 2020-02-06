@extends('plantilla')
@section('titulo')
IL Nato Home
@endsection
@section('css')
home
@endsection('css')
@section('main')

  {{-- <div id="main" class="pimg1">
        <div class="ptext"> --}}
          {{-- <a class="texto-parallax" href="/productos">PRODUCTOS</a> --}}
          {{-- <a class="texto-parallax" href="/productos">OFERTAS</a> --}}
        {{-- </div>
      </div> --}}
      <section class="section section-light">
        <h2 class="wow fadeInDown">Nuevo en Tienda</h2>
        <p>
          Commodi, vitae. Minima soluta tempt optio aliquam et, dolorem a cupiditate nihil fuga laboriosam fugiat placeat dignissimos! Unde eveniet placeat quisquam blanditiis ore ex, omnis!
        </p>
      </section>
      <div class="pimg2">
        <div class="ptext">
          {{-- <div class="twoLabels"> --}}
            {{-- <span class="texto-parallax wide">HOMBRE</span>
            <span class="texto-parallax wide">MUJER</span> --}}
          {{-- </div> --}}
        </div>
      </div>
      <section class="section section-light">
        <h2 class="bounceInLeft">Tendencias</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, laudantium, quibusdam? Nobis, delectus, commodi, fugit amet tempor
        </p>
      </section>
      <div class="wow animated bounceInRight pimg3">
        <div class="ptext2">
          <a class="texto-parallax" href="/productos">PRODUCTOS</a>
          <a class="texto-parallax" href="/productos">OFERTAS</a>
        </div>
      </div>
      <section class="section section-light">
        <h2 class="wow animated bounceInLeft">En liquidacion</h2>
        <p class="">
          Lorem ipsum dolor sit amet, co provident dolorem modi cumque illo enim quuisquam quasi cum
        </p>
      </section>
@endsection('main')
