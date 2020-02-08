@extends('plantilla')
@section('css')
addedit
@endsection
@section('main')

  <div class="container">
    <h2 class="centrado titulo">Agregar Producto</h2>

    <form class="main_form" action="/addproduct" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="col-md-4 offset-md-2 form-group">
          <label>Nombre: *</label>
          <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Ingrese el nombre" autofocus>
          @error('title')
                <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-md-4 form-group">
          <label>Precio: *</label>
          <input class="form-control" type="number" min="100" name="price" step="100" @if (old('price') !== null) value="{{ old('price') }}" @else value="0" @endif>
          @error('price')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 offset-md-2 form-group">
          <label for="brand_id">Marca: *</label>
          <select class="form-control" name="brand_id">
            <option value="">Seleccione una marca</option>
            @foreach ($brands as $brand)
              <option value="{{$brand->id}}" {{($brand->id == old('brand_id'))?'selected': '' }}>{{$brand->name}}</option>
            @endforeach
          </select>
          @error('brand_id')
                <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-md-4 form-group">
          <label for="genre_id">Genero</label>
          <select class="form-control" name="genre_id">
            <option value="">Seleccione una opcion</option>
            @foreach ($genres as $genre)
              <option value="{{$genre->id}}" {{($genre->id == old('genre_id'))?'selected': '' }}>{{$genre->name}}</option>
            @endforeach
          </select>
          @error('genre_id')
                <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 offset-md-2 form-group">
          <label>Categoria: </label>
          <select class="form-control"name="category_id">
            <option value="">Seleccione una categoria</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}" {{($category->id == old('category_id'))?'selected': '' }}>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category')
                <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-md-4 form-group">
          <label>Modelo: *</label>
          <input class="form-control" type="text" name="model" @if (old('model') !== null) value="{{ old('model') }}" @else value="" @endif placeholder="Ingrese el modelo">
          @error('model')
                <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 offset-md-2 form-group">
          <label for="">En oferta?: </label>
          <select id='onSale' class="form-control" name="onSale">
            <option value =0 {{(0 == old('onSale'))?'selected': ''}}>No esta en oferta</option>
            <option value =1 {{(1 == old('onSale'))?'selected': ''}}>Esta en oferta</option>
          </select>
        </div>

        <div id="discount" @if (old('onSale') == 1) class="col-md-4 form-group" @else class="hidden col-md-4 form-group" @endif>
          <label>Descuento</label>
          <input id="inputDiscount" class="form-control" type="number" name="discount" max="80" step="5" @if (old('discount') !== null) value="{{ old('discount') }}" @else value="" @endif >
          @error('discount')
                <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <label class='centrado'>Stock:</label>
      <div class="row">

        @foreach ($sizes as $size)
          <div class="col-4 col-lg-2 form-group">
            <label for="">{{$size->name}}</label>
            <input class="cantidad form-control" type="number" name="{{$size->name}}" min=0 @if (old($size->name) !== null) value="{{ old($size->name) }}" @else value="0" @endif>
            <br>
          @error('{{$size->name}}')
                <p class="errorForm">{{ $message }}</p>
          @enderror
          </div>
        @endforeach
      </div>

      <div class="row">
        <div class="col-lg-4 offset-lg-2 col-md-6  form-group">
          <label for="">Agregue la/s imagenes del producto: *</label>
          <label for="file-upload" class="subir">
          <i class="fas fa-cloud-upload-alt"></i> Subir imagen
          </label>
          <br>
          {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
          <input type="file" id="file-upload" onchange='change()' style='display: none;' class="sin-archivo"  name="images[]" value="" multiple >
          <div id="info"></div>
          @error('images')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          {{-- @error('images.*')
            <p class="errorForm">{{ $message }}</p>
          @enderror --}}
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2MB</small><br>
          <button type="submit" class="btn enviar" value="Add Product">Agregar producto</button>
          <br><br><small id="emailHelp" class="form-text text-muted">Los valores con un * son obligatorios.</small>
        </div>
      </div>

    </form>
  </div>
@endsection
