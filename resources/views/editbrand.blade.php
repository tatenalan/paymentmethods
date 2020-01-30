@extends('plantilla')
@section('css')
form
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Editar marca</h5>
    @foreach ($brands as $brand)
      <div class="form-signup">
        <form class="form-signup" action='/editbrand' method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @method('put')
          <div class="row">
            <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
              <label for="">Nombre: </label>
              <input type="text" hidden name="id" value="{{$brand->id}}">
              <input type="text" class="form-control" name="name" value="{{$brand->name}}">
              @error('name')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" name="button">Editar Marca</button>
          </div>
        </form>
        <form class="" action="/deletebrand" method="post">
          {{csrf_field()}}
          <input type="text" hidden name="id" value="{{$brand->id}}">
          <button type="submit" name="button">Eliminar marca</button>
        </form>
      </div>
    @endforeach
    <h5 class="centrado titulo">Agregar marca</h5>
    <form class="form-signup" action='/addbrand' method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="row">
        <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">Nombre: </label>
          <input type="text" class="form-control" name="name" placeholder="Nombre de la marca" value="">
          @error('name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" name="button">Agregar Marca</button>
      </div>
    </form>
  </div>
@endsection
