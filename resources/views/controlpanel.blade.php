@extends('plantilla')
@section('titulo')
Panel de Control
@endsection
@section('css')
control
@endsection('css')
@section('main')

  <div class="container">

    <div class="controles">

      <a class="control" href="/addproduct">Agregar Producto</a>
      <a class="control" href="/editproduct">Editar Producto</a>
      <a class="control" href="/editbrand">Agregar / Editar Marcas</a>
      <a class="control" href="/editcategory">Agregar / Editar Categorias</a>
      <a class="control" href="/editcolor">Agregar / Editar Colores</a>

    </div>

  </div>

@endsection
