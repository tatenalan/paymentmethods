@extends('plantilla')
@section('titulo')
Editar Perfil
@endsection('titulo')
@section('css')
profile
@endsection('css')
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Editar Perfil</h5>

        <!-- Vista de edicion del Usuario-->
    <form class="" action='/profile' method="post" enctype="multipart/form-data">
      @csrf
      @method('put')


        <div class="form-group">
          <label for="">Nombre: *</label>
          <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }} ">
          @error('name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>


      <br>


        <div class="form-group">
          <label for="">Email: *</label>
          <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
          @error('email')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

          <br>

        <div class="form-group">
          <label for="">Contraseña: *</label>
          <input type="password" class="form-control" name="password" value="" placeholder="Ingresa tu nueva password">
          @error('password')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>


      <br>


        <div class="form-group">
          <input type="submit" class="btn btn-info" name="" value="Editar Usuario">
        </div>
    </form>

    <form class="" action="/deleteUser" method="post">
      @csrf
      <div class="form-group">
      <input type="submit" class="btn btn-danger" name="" value="Eliminar Usuario">
    </form>
      </div>
      <div class="">
      <a href="/profile" class="centrado">Volver atras</a>
      </div>


  </div>


@endsection('main')
