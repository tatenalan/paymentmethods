<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Genre;
use App\Image;
use App\Brand;
use App\Size;
use App\Stock;

class ProductController extends Controller
{


      public function directory(Product $product)
      {
       $products = Product::all();
       $sizes = Size::all();
       $vac = compact('products','sizes');
       return view('/productos',$vac);
      }



      public function new() // Se muestra un form con los campos vacios para agregar un producto
      {
        $genres = Genre::all();
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $vac = compact('genres','brands','categories','sizes');
        return view('/addproduct',$vac);
      }



      public function store(Request $request) // agrega un producto y te redirige a la lista de productos
      {

// dd($ request);
        $reglas = [
          'title' => 'required|string|min:1|max:50',
          'price' => 'required|integer|min:50|max:150000',
          'discount' => 'integer|max:80|nullable', // para hacer required discount hay que tenerlo hidden siempre
          'genre_id' => 'required',
          'brand_id' => 'required',
          'model' => "max:255|required|",
          "images" => "required|array|min:1",
          "images.*" => 'image|mimes:jpg,jpeg,png|max:2048',
          ];


          $mensajes = [
            "model.max" => "El nombre del modelo es muy largo",
            "title.required" => "Ingrese el nombre del producto",
            "price.required" => "Ingrese el precio del producto",
            "brand_id.required" => "Debe seleccionar la marca",
            "genre_id.required" => "Debe seleccionar el genero",
            "model.required" => "Debe ingresar el Modelo",
            'string' => "El campo :attribute debe ser un texto",
            "price.min" => "El precio debe ser mayor a $50",
            "min" => "El campo :attribute tiene un minimo de :min caracteres",
            "max" => "El campo :attribute tiene un maximo de :max caracteres",
            "images.*.image" => "Debe ser un formato de imagen",
            "mimes" => "Formato de imagen invalido",
            "images.*.max" => 'La imagen es muy pesada',
            "images.min" => "Debes subir al menos una imagen",
            "images.required" => "Sube una imagen del producto",
            "discount.max" => "Debe tener como maximo 80% de descuento",
          ];


          $this->validate($request, $reglas, $mensajes);
          $product = new Product();
          $product->name = $request->title; // alternativa $producto->name = $request->name;
          $product->price = $request->price;
          $product->onSale = $request->onSale;
          $product->model = $request->model;
          if ($request->onSale==1) {
            $product->discount = $request->discount;
          }
          else {
            $product->discount = null;
          }
          $product->genre_id = $request->genre_id;
          $product->category_id = $request->category_id;
          $product->brand_id = $request->brand_id;

          // guardo en la base de datos
          $product->save();

          // traigo el producto recien creado para obtener su ID
          $lastProduct = Product::all()->last();
          $productId = $lastProduct->id;

          if (!empty($request['images'])) { // si suben una o mas fotos, entonces comenzamos el proceso de guardado
          // obtengo el array de imagenes

          $images = $request->file('images');
          // traigo las imagenes y recorro el array
          foreach ($images as $image) {
            // guardo cada imagen en storage/public (no en la base de datos)
            $file = $image->store('public');
            // obtengo sus nombres
            $path = basename($file);


            // por cada imagen instancio un objeto de la clase imagen
            $image = new Image;
            // asigno las rutas correspondientes y asigno el id de la imagen que debe ser igual al id del ultimo producto creado
            $image->product_id = $productId;
            $image->path = $path;

            // guardo el objeto imagen instanciado en la base de datos
            $image->save();
          }
        }

        $sizes = Size::all();

        foreach ($sizes as $size) {
          $stock = new Stock;
          $name = $size->name;
          $stock->product_id = $productId;
          $stock->size_id = $size->id;
          $stock->quantity= $request->$name;
          $stock->save();
        }

          return redirect('/productos')
          ->with('status', 'Producto creado exitosamente!!!')
          ->with('operation', 'success');
      }



      public function show($id)  // se muestran los datos del producto elegido
      {
        $product = Product::find($id);
        // $images = Image::where('product_id', '=', $id)->get();
        // $stock = Stock::find($id);
        // $sizes = Size::all();

        return view('/producto', compact('product'));
      }



      public function edit($id)  // se muestran los datos del producto elegido listo para editar
      {
        $product = Product::find($id);
        $genres = Genre::all();
        $brands = Brand::all();
        $images = Image::where('product_id', '=', $id)->get();
        $categories = Category::all();
        $stocks = Stock::where('product_id','=',$product->id)->get();
        $sizes = Size::all();

        return view('/editproduct', compact('product','genres', 'categories','images' ,'sizes', 'stocks','brands'));
      }




      public function update(Request $request, int $id) // se muestra el producto con los campos completos listo para editar. A diferencia de guardar, update lleva tambien la variable $id
      {
          // Declaro las variables de validacion
        $reglas = [
           'name' => 'required|string|min:1|max:50',
           'price' => 'required|integer|min:50|max:150000',
           'discount' => 'integer|nullable|max:80',
           'model' => 'max:255|required',
           "images" => "array",
           "images.*" => 'image|mimes:jpg,jpeg,png|max:2048',
           ];
        $mensajes = [
           "model.max" => "El nombre del modelo es muy largo",
           "name.required" => "Ingrese el nombre del producto",
           "price.required" => "Ingrese el precio del producto",
           "model.required" => "Debe ingresar el modelo",
           'string' => "El campo :attribute debe ser un texto",
           "price.min" => "El precio debe ser mayor a $50",
           "min" => "El campo :attribute tiene un minimo de :min caracteres",
           "max" => "El campo :attribute tiene un maximo de :max caracteres",
           "images.*.image" => "Debe ser un formato de imagen",
           "mimes" => "Formato de imagen invalido",
           "images.*.max" => 'La imagen es muy pesada',
           "images.min" => "Debes subir al menos una imagen",
           ];

           // validamos
           $this->validate($request, $reglas, $mensajes);

            // llamo al producto a editar
            $product = Product::find($id);

            $product->name = $request->name;
            $product->model = $request->model;
            $product->price = $request->price;
            $product->onSale = $request->onSale;
            $product->discount = $request->discount;
            $product->genre_id = $request->genre_id;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->save();

            $stocks = $product->stocks;

            foreach ($stocks as $stock) {
              $stock->quantity = $request[$stock->size->name];
              $stock->save();
            }

            $genres = Genre::all();
            $images = Image::where('product_id', '=', $id)->get();
            $categories = Category::all();
            $stock = Stock::find($id);
            $sizes = Size::all();
            $brands = Brand::all();

            // return view('/edit', compact('product','genres', 'categories','images' ,'sizes', 'stock','brands'));
            $vac = compact('product','genres', 'categories','images' ,'sizes', 'stock','brands');
            // Redirijo
            return redirect('/producto/'.$product->id);
      }


      public function deleteproduct(int $id)
      {
        // llamamos al producto a eliminar mediante su id
        $product = Product::find($id);
        $images = $product->images;
        $stocks = Stock::where('product_id', '=', $id)->get();


        foreach ($images as $image) {
        // por cada imagen seleccionamos su path y si existe la borramos de storage
        $image_path = storage_path('app/public/') . $image->path;
        // verificamos si existe en la base de datos y en storage
          if ($images && file_exists($image_path)) {
            // elimina las imagenes de storage
            unlink($image_path);
            // borramos las imagenes de la bd utilizando la relacion del modelo
            $image->delete();
          }
        }

        $product->delete(); // borramos el producto
        foreach ($stocks as $stock) {
          $stock->delete(); // borramos todos sus stocks
        }
        return redirect("/");
      }




      public function addImage(Request $request){

          $reglas = [
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,jpg,png|max:2000",
          ];


          $mensajes = [
            "images.*.image" => "Debe ser un formato de imagen",
            "mimes" => "Formato de imagen invalido",
            "images.*.max" => 'La imagen es muy pesada',
            "images.required" => "Debes subir una imagen"

          ];

          // Validamos
          $this->validate($request, $reglas, $mensajes);
          // si suben una o mas fotos, entonces comenzamos el proceso de guardado
          if ($request->file('images')) {
            // traigo las imagenes a agregar
            $images = $request->file('images');
            // recorro el array con un foreach
            foreach ($images as $image) {
              // guardo cada imagen en storage/public (no en la base de datos)
              $file = $image->store('public');
              // obtengo sus nombres
              $path = basename($file);
              // por cada imagen instancio un objeto de la clase imagen
              $image = new Image;
              // asigno las rutas correspondientes y asigno el id de la imagen que debe ser igual al id del ultimo producto creado
              $image->product_id = $request->productid;
              $image->path = $path;

              // guardo el objeto imagen instanciado en la base de datos
              $image->save();
              // nos retorna a la ruta anterior
              }
            }
            return back();
          }



      public function deleteImage(Request $request)
      {

        $images = Image::where('product_id', '=', $request->productoid)->get();

        // Verificamos que no sea la unica imagen del producto
        if (count($images)!=1) {
          // traigo la imagen del request imagenid (name del file)
          $image = Image::find($request->imagenid);
          // elimina las imagenes de storage
          unlink(storage_path('app/public/').$image->path);
          // borramos las imagenes de la bd
          $image->delete();
          // nos retorna a la ruta anterior
          return back();
        }
        // $errorUnicaImagen = 'No puedes eliminar la unica imagen';
        // Si es la unica imagen del producto, nos redirige automaticamente sin borrarla
        // return redirect()->to('/editproduct/'.$request->productoid.'?'. http_build_query(['errorUnicaImagen'=>$errorUnicaImagen]));
        return back();
      }

      public function searchBySize($talle)  // se muestran los datos del producto elegido
      {

        // la variable talle es = $size->name
        // Traemo el size donde su nombre sea igual al de la query
        $sizes = Size::where('name','=',$talle)->get();

        // Con el sizes->first() accedemos al array que nos trae el where:: , que va a tener
        // una sola posicion, la primera.

        // traemos los stock donde el size_id sea igual al talle de la query
        $stocks = Stock::where('size_id','=',$sizes->first()->id)
        // y tambien que haya por lo menos 1 producto de stock
        ->where('quantity','>',0)
        ->get();
        
        // generamos un array vacio de productos para que solo traiga los que tienen stock del talle seleccionado
        $products=[];
        foreach ($stocks as $stock) {
          // cada uno lo sumamos al array
          $products[]=$stock->product;
        }

        $sizes = Size::all();
        return view('/productos', compact('products','sizes'));
      }

}
