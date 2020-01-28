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
       return view('/index',$vac);
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
   public function store()
   {
     
   }
}
