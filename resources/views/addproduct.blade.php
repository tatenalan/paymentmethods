@php
  // dd($errors);
@endphp
@extends('plantilla')
@section('css')
form
@endsection
@section('main')
  <h2>Agregar Producto</h2>
  <form class="" action="/addproduct" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
      <label for="title">Nombre: </label>
      <input type="text" name="title" value="">
      @error('title')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
      <label for="price">Precio: </label>
      <input type="number" name="price" step="100" value="500" min="100">
      @error('price')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
      <label for="onSale">¿Esta en oferta?</label>
      <select id='oferta' class="" name="onSale">
        <option value=0>No esta en oferta</option>
        <option value=1>Esta en oferta</option>
      </select>
      @error('onSale')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="discountDiv" hidden>
      <label for="discount">Descuento</label>
      <input type="number" name="discount" value="0" step="5" min="0" max="70">
      @error('discount')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
      <label for="genre">Genero</label>
      <select class="" name="genre">
        <option value="">Seleccione una opcion</option>
        @foreach ($genres as $genre)
          <option value="{{$genre->id}}" {{($genre->id == old('genre_id'))?'selected': '' }}>{{$genre->name}}</option>
        @endforeach
      </select>
      @error('genre_id')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
      <label for="category">Categoria: </label>
      <select class="" name="category">
        <option value="">Seleccione una categoria</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}" {{($category->id == old('category_id'))?'selected': '' }}>{{$category->name}}</option>
        @endforeach
      </select>
      @error('category')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
      <label for="brand">Marca</label>
      <select class="" name="brand">
        <option value="">Seleccione una marca</option>
        @foreach ($brands as $brand)
          <option value="{{$brand->id}}" {{($brand->id == old('brand_id'))?'selected': '' }}>{{$brand->name}}</option>
        @endforeach
      </select>
      @error('brand')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
      <label for="">Stock</label>
      @foreach ($sizes as $size)
        <label for="">{{$size->name}}</label>
        <input type="number" name="{{$size->name}}" min=0 value="0">
        <br>
      @endforeach
      @error('sizes')
            <p class="errorForm">{{ $message }}</p>
      @enderror
    </div>
    <div class="">
          <label for="">Agregue la/s imagenes del producto:</label>
          <label for="file-upload" class="subir">
          <i class="fas fa-cloud-upload-alt"></i> Subir archivo
          </label>
          @error('images')
                <p class="errorForm">{{ $message }}</p>
          @enderror
          <br>
          {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
          <input type="file" id="file-upload" style='display: none;' class="sin-archivo"  name="images[]" value="" multiple >
          <div id="info"></div>
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2MB</small><br>
          <button type="submit" class="btn btn-success" value="Add Product">Agregar producto</button>
          <br><br><small id="emailHelp" class="form-text text-muted">Los valores con un * son obligatorios.</small>
        </div>
  </form>
  <script src="/js/agregarProducto.js" charset="utf-8"></script>
@endsection
