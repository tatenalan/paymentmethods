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
       $categories = Category::all();
       $images = Image::all();
       $vac = compact('products','categories','images');
       return view('/productos',$vac);
     }

  public function editview($id)
  {
    $product = Product::find($id);
    $genres = Genre::all();
    $images = Image::where('product_id', '=', $id)->get();
    $categories = Category::all();
    $stock = Stock::find($id);
    $sizes = Size::all();

    return view('/edit', compact('product','genres', 'categories','images' ,'sizes', 'stock'));
  }
  public function deleteproduct(int $id){
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
        $stock->delete();
      }
      return redirect("/");
    }
   public function addProduct()
   {
      $genres = Genre::all();
      $categories = Category::all();
      $brands = Brand::all();
      $sizes = Size::all();
      $vac = compact('genres','brands','categories','sizes');
      return view('/addproduct',$vac);
   }
   public function store(Request $request)
   {
<<<<<<< HEAD
     $reglas = [
        'title' => 'required|string|min:1|max:50',
        'price' => 'required|integer|min:50|max:150000',
        'discount' => 'integer|min:10|max:80', // para hacer required discount hay que tenerlo hidden siempre
        'genre' => 'required',
        "images" => "required|array|min:1",
        "images.*" => 'image|mimes:jpg,jpeg,png|max:2048',
        'brand' => 'required',
        ];
        $mensajes = [
          "title.required" => "Ingrese el nombre del producto",
          "price.required" => "Ingrese el precio del producto",
          "brand.required" => "Seleccione la marca del producto",
          "genre.required" => "Seleccione el genero",
          'string' => "El campo :attribute debe ser un texto",
          "price.min" => "El precio debe ser mayor a $50",
          "min" => "El campo :attribute tiene un minimo de :min caracteres",
          "max" => "El campo :attribute tiene un maximo de :max caracteres",
          "images.*.image" => "Debe ser un formato de imagen",
          "mimes" => "Formato de imagen invalido",
          "images.*.max" => 'La imagen es muy pesada',
          "images.min" => "Debes subir al menos una imagen",
          "images.required" => "Sube una imagen del producto",
          "discount.min" => "Debe tener al menos un 10% de descuento",
        ];

          $this->validate($request, $reglas, $mensajes);
        // dd($request);
        $product = new Product();
        $product->name = $request->title; // alternativa $producto->name = $request->name;
        $product->price = $request->price;
        $product->onSale = $request->onSale;
        $product->discount = $request->discount;
        $product->genre_id = $request->genre;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;

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

        return redirect('/')
        ->with('status', 'Producto creado exitosamente!!!')
        ->with('operation', 'success');
=======

>>>>>>> 4d83ab0368470bb408efbf71b19bf26cdc5cf283
   }
  public function deleteImage(Request $request)
  {
      $image = Image::find($request->imagenid);

      unlink(storage_path('app/public/').$image->path);

      $image->delete();

      return back();
  }
  public function editproduct(Request $request, int $id)
  {
    return view('edit');
  }
}
