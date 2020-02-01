@extends('plantilla')
@section('titulo')
Profile
@endsection('titulo')
@section('css')
profile
@endsection('css')
@section('main')
  <div class="container">
    <div class="orden">
      <h3>Bienvenido {{ Auth::user()->name }}</h3>
      <li>Tu email es: {{ Auth::user()->email }}</li>
      <a href="/edituser">Editar Perfil</a>
    </div>
  </div>
@endsection('main')
