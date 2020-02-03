@extends('plantilla')
@section('css')
addedit
@endsection
@section('main')

  <div class="container">
    <h5 class="centrado titulo">Editar Categoria</h5>

    @foreach ($categories as $category)
      <div class="form-signup">
        <form class="form-signup" action='/editcategory' method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @method('put')

            <div class="form-group">
              <label for="">Nombre: </label>
              <input type="text" hidden name="id" value="{{$category->id}}">
              <input type="text" class="form-control" name="name" value="{{$category->name}}">
              @error('name')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
            <button class="enviar" type="submit" name="button">Editar Marca</button>


        </form>
        <form class="" action="/deletecategory" method="post">
          {{csrf_field()}}

          <input type="text" hidden name="id" value="{{$category->id}}">
          <button class="eliminar" type="submit" name="button">Eliminar marca</button>
        </form>
      </div>
    @endforeach


    <h5 class="centrado titulo">Agregar categoria</h5>
    <form class="form-signup" action='/addcategory' method="post">
      {{csrf_field()}}


        <div class="form-group">
          <label for="">Nombre: </label>
          <input type="text" class="form-control" name="name" placeholder="Nombre de la categoria" value="">
          @error('name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
        <button class="enviar" type="submit" name="button">Agregar Categoria</button>

    </form>
  </div>
@endsection
