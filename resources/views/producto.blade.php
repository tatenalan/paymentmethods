@extends('plantilla')
@section('titulo')
Producto
@endsection
@section('css')
producto
@endsection('css')
@section('main')


  <img id="imagenGran"class="imagen-producto" src="/storage/{{$product->images[0]->path}}" alt="">


@endsection
