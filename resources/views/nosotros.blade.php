@extends('plantilla')
@section('titulo')
IL Nato Home
@endsection
@section('css')
nosotros
@endsection('css')
@section('main')


  <section class="map">
    <div class="">
      <img src="/img/zapas2.png" alt="">
    </div>

{{-- <div id = "map" style = "width: 100%; height: 400px;"> </div> --}}
    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5629.466873952337!2d-58.4682444433779!3d-34.81662429937207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd1640042a561%3A0x2558d9dc766ab0a8!2sA.%20Rojas%2036%2C%20B1842ACB%20Monte%20Grande%2C%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1580282315857!5m2!1ses-419!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
  </section>

{{-- <script src="js/map.js"></script> --}}
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCiOC1F95ef7rGN9KkpvQ35xmkWbxi4yc&callback=initMap" type="text/javascript"></script> --}}


@endsection
