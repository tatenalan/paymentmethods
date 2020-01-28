@extends('plantilla')
@section('css')
form
@endsection
@section('main')
  <h2>Agregar Producto</h2>
  <form class="" action="/" method="post">
    <div class="">
      <label for="title">Nombre: </label>
      <input type="text" name="title" value="">
    </div>
    <div class="">
      <label for="precio">Precio: </label>
      <input type="number" name="precio" value="">
    </div>
    <div class="">
      <label for="oferta">¿Esta en oferta?</label>
      <select class="" name="">
        <option value="">Seleccione una opcion</option>
        <option value=1>Esta en oferta</option>
        <option value=0>No esta en oferta</option>
      </select>
    </div>
    <div class="">
      <label for="descuento">Descuento</label>
      <input type="number" name="" value="" step="5" min="5" max="70">
    </div>
    <div class="">
      <label for="">Genero</label>
      <select class="" name="genero">
        <option value="">Seleccione una opcion</option>
        @foreach ($genres as $genre)
          <option value="{{$genre->id}}" {{($genre->id == old('genre_id'))?'selected': '' }}>{{$genre->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="">
      <label for="category">Categoria: </label>
      <select class="" name="category">
        <option value="">Seleccione una categoria</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}" {{($category->id == old('category_id'))?'selected': '' }}>{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="">
      <label for="brand">Marca</label>
      <select class="" name="brand">
        <option value="">Seleccione una marca</option>
        @foreach ($brands as $brand)
          <option value="{{$brand->id}}" {{($brand->id == old('brand_id'))?'selected': '' }}>{{$brand->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="">
      <label for="">Stock</label>
      @foreach ($sizes as $size)
        <label for="">{{$size->name}}</label>
        <input type="number" name="size" value="">
        <br>
      @endforeach
    </div>
    <div class="">
          <label for="">Agregue la/s imagenes del producto:</label>
          <label for="file-upload" class="subir">
          <i class="fas fa-cloud-upload-alt"></i> Subir archivo
          </label>
          <br>
          {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
          <input type="file" id="file-upload" onchange='change()' style='display: none;' class="sin-archivo"  name="images[]" value="" multiple >
          <div id="info"></div>
          @error('images')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          @error('images.*')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2MB</small><br>
          <button type="submit" class="btn btn-success" value="Add Product">Agregar producto</button>
          <br><br><small id="emailHelp" class="form-text text-muted">Los valores con un * son obligatorios.</small>
        </div>
  </form>
@endsection
