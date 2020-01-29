@extends('plantilla')
@section('titulo')
IL Nato Home
@endsection
@section('css')
home
@endsection('css')
@section('main')

  <div id="main" class="pimg1">
        <div class="ptext">
          {{-- <span class="texto-parallax">IL NATO</span> --}}
        </div>
      </div>
      <section class="section section-light">
        <h2>Nuevo en Tienda</h2>
        <p>
          Commodi, vitae. Minima soluta tempt optio aliquam et, dolorem a cupiditate nihil fuga laboriosam fugiat placeat dignissimos! Unde eveniet placeat quisquam blanditiis ore ex, omnis!
        </p>
      </section>
      <div class="pimg2">
        <div class="ptext">
          <div class="twoLabels">
            {{-- <span class="texto-parallax wide">HOMBRE</span>
            <span class="texto-parallax wide">MUJER</span> --}}
          </div>
        </div>
      </div>
      <section class="section section-light">
        <h2>Tendencias</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, laudantium, quibusdam? Nobis, delectus, commodi, fugit amet tempor
      </section>
      <div class="pimg3">
        <div class="ptext2">
          <span class="texto-parallax"><a href="/ofertas">Ofertas</a></span>
        </div>
      </div>
      <section class="section section-light">
        <h2>En liquidacion</h2>
        <p>
          Lorem ipsum dolor sit amet, co provident dolorem modi cumque illo enim quuisquam quasi cum
      </section>
@endsection('main')
