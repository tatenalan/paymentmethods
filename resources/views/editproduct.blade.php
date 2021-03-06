@extends('plantilla')
@section('css')
addedit
@endsection
@section('main')
  <div class="container">
    <h2 class="centrado titulo">Editar Producto</h2>

        <!-- Vista de edicion del Producto-->
      <form class="main_form" action='/editproduct/{{$product['id']}}' method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">  {{--<!-- alternativa @method('put') --}}

        <div class="row">
          <div class="col-md-4 offset-md-2 form-group">
            <label for="">Nombre: *</label>
            <input type="text" class="form-control" name="name" value="{{ old('name',$product->name)}}"> <?php // Se le pone el old(name, product name) No solo para que agarre los datos del nombre sino para que tambien persistan los cambios ante un error ?>
            @error('name')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>

          <div class="col-md-4 form-group">
            <label for="">Precio: *</label>
            <input type="number" class="form-control" min="100" max="15000" step="100" name="price" value="{{ old('price',$product->price)}}">
            @error('price')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 offset-md-2 form-group">
            <label for="">Marca: *</label>
            <select class="form-control" name="brand_id">
              <option value="">Seleccione una marca</option>
              @foreach ($brands as $brand)
                <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected @endif>{{$brand->name}}</option>
              @endforeach
            </select>
            @error('brand_id')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>

          <div class="col-md-4 form-group">
            <label for="">Genero: *</label>
            <select class="form-control" name="genre_id">
              <option value="">Seleccione un genero</option>
              @foreach ($genres as $genre)
                <option value="{{$genre->id}}" @if($genre->id == $product->genre_id) selected @endif>{{$genre->name}}</option>
              @endforeach
            </select>
            @error('genre_id')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="row">
          <div id="categoria" class="col-md-4 offset-md-2 form-group">
            <label for="">Categoria: *</label>
            <select id="categoryId" class="form-control" name="category_id">
              <option value="">Seleccione una categoria</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
              @endforeach
            </select>
            @error('category_id')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>

          <div class="col-md-4 form-group">
            <label for="">Modelo: *</label>
            <input type="text" class="form-control" name="model" value="{{ old('model',$product->model)}}">
            @error('model')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 offset-md-2 form-group">
              <label for="">En oferta? : </label>
              <select id="onSale" class="form-control" name="onSale">
                  <option value =0 @if($product->onSale == 0) selected @endif>No esta en oferta</option>
                  <option value =1 @if($product->onSale == 1) selected @endif>Esta en oferta</option>
              </select>
          </div>

          <div id="discount" @if ($product->onSale == 1) class="col-md-4 form-group" @else class="hidden col-md-4 form-group" @endif>
            <label for="">Descuento: </label>
            <input id="inputDiscount" class="form-control" type="number" name="discount" min="0" max="80" step="5" value="{{ old('discount',$product->discount)}}">
          @error('discount')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          </div>
        </div>


        <label class='centrado'>Stock:</label>
        <div class="row">

          @foreach ($product->stocks as $stock)
            <div class="col-4 col-lg-2 form-group">
              <label for="{{$stock->size->name}}">{{$stock->size->name}}</label>
              <input class="cantidad form-control" type="number" name="{{$stock->size->name}}" value="{{$stock->quantity}}">
            </div>
          @endforeach
        </div>

        <div class="form-group">
          <button type="submit" hidden id="botongeneral" class="btn enviar" value="Edit Product">Editar producto</button>
        </div>
      </form>

      <form class="" action="/addimage" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">
          <div class="col-lg-4 offset-lg-2 col-md-6  form-group">
            <label for="">Agregar imagenes al producto</label><br>
            <label for="file-upload" class="subir"><i class="fas fa-cloud-upload-alt"></i> Subir archivo</label>
            <input type="file" id="file-upload" onchange='change()' style='display: none;' name="images[]" value="" multiple >
            <div id="info"></div>
            @error('images')
              <p class="errorForm">{{ $message }}</p>
            @enderror
            @error('images.*')
              <p class="errorForm">{{ $message }}</p>
            @enderror
            <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2mb</small>
            <input type="hidden" name="productid" value="{{$product->id}}"><br>
            <button type="submit" class="btn enviar" value="">Agregar imagen</button>
          </div>
        </div>

      </form>


      <div class="flex">
        @foreach ($product->images as $image)
          <form class="" action="/deleteimage" method="post">
            @csrf
            <img class="product-img" style="margin-bottom:10px;margin-top:10px;" src="/storage/{{$image->path}}" alt=""><br>
            <input type="hidden" name="imagenid" value="{{$image->id}}">
            <input type="hidden" name="productoid" value="{{$product->id}}">
            <button type="submit" class="eliminar-imagen" name="">X</button>
            <div hidden class="divErrorImagen">
              <p class="mensajeErrorImagen"></p>
            </div>
          </form>
        @endforeach
      </div>

        <br>
      <div class="flex">
        <label class="btn enviar" for="botongeneral">Editar producto</label>
        <form class="" onclick="confirmar()" action="/delete/product/{{$product->id}}" method="post">
          @csrf
          <button type="submit" class="eliminar">Eliminar producto</button>
        </form>
      </div>

  </div>
@endsection
<script src="/js/editProduct.js" charset="utf-8"></script>
