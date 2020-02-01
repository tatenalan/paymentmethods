@extends('plantilla')
@section('css')
form
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Editar Colores</h5>
    @foreach ($colors as $color)
      <div class="form-signup">
        <form class="form-signup" action='/editcolor' method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @method('put')
          <div class="row">
            <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
              <label for="">Nombre: </label>
              <input type="text" hidden name="id" value="{{$color->id}}">
              <input type="text" class="form-control" name="name" value="{{$color->name}}">
              @error('name')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" name="button">Editar color</button>
          </div>
        </form>
        <form class="" action="/deletecolor" method="post">
          {{csrf_field()}}
          <input type="text" hidden name="id" value="{{$color->id}}">
          <button type="submit" name="button">Eliminar color</button>
        </form>
      </div>
    @endforeach
    <h5 class="centrado titulo">Agregar color</h5>
    <form class="form-signup" action='/addcolor' method="post">
      {{csrf_field()}}
      <div class="row">
        <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">Nombre: </label>
          <input type="text" class="form-control" name="name" placeholder="Nombre de la color" value="">
          @error('name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" name="button">Agregar color</button>
      </div>
    </form>
  </div>
@endsection
