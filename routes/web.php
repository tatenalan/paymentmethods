<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Auth::routes();

// GET      | login                    | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
// POST     | login                    | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
// POST     | logout                   | App\Http\Controllers\Auth\LoginController@logout                       | web          |
// POST     | password/email           | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
// POST     | password/reset           | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
// GET      | password/reset           | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
// GET      | password/reset/{token}   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
// POST     | register                 | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
// GET      | register                 | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |

*/



Route::get('/', function() {
  return view('index');
});

Route::get('/contacto', function() {
  return view('contacto');
});

// Route::post('/contacto', function(Request $request){
//   Mail::send(new ContactMail($request));
//   return redirect ('/');
// });

Route::get('/nosotros', function() {
  return view('nosotros');
});

Route::get('/FAQs', function() {
  return view('FAQs');
});

// Productos

Route::get('/productos', 'ProductController@directory');

Route::get('/ofertas', 'ProductController@ofertas');

Route::get('/addproduct', 'ProductController@new')->middleware('admin');

Route::post('/addproduct', 'ProductController@store')->middleware('admin');

Route::get('/producto/{id}', 'ProductController@show');

Route::get('/editproduct/{id}', 'ProductController@edit')->middleware('admin');

Route::put('/editproduct/{id}', 'ProductController@update')->middleware('admin');

Route::post('/delete/product/{id}', 'ProductController@deleteproduct')->middleware('admin');

Route::post('/addimage', 'ProductController@addImage')->middleware('admin');

Route::post('/deleteimage', 'ProductController@deleteImage')->middleware('admin');

Route::get('/productos/talle/{talle}', 'ProductController@searchBySize');

Route::get('/searchproduct', 'ProductController@showallproducts')->middleware('admin');

Route::get('/searchproduct/searchName', 'ProductController@searchProductByName')->middleware('admin');

Route::get('/searchproduct/searchModel', 'ProductController@searchProductByModel')->middleware('admin');

Route::get('/searchproduct/searchBrand', 'ProductController@searchProductByBrand')->middleware('admin');


// users

Route::get('/profile', 'UserController@show')->middleware('auth');

Route::get('/edituser', 'UserController@edit')->middleware('auth');

Route::post('/deleteuser', 'UserController@delete')->middleware('auth');

Route::put('/profile', 'UserController@update')->middleware('auth');

// Marcas

Route::get('/editbrand', 'BrandController@index')->middleware('admin');

Route::post('/addbrand', 'BrandController@store')->middleware('admin');

Route::put('/editbrand', 'BrandController@update')->middleware('admin');

Route::post('/deletebrand', 'BrandController@destroy')->middleware('admin');


// Categorias

Route::get('/editcategory', 'CategoryController@index')->middleware('admin');

Route::post('/addcategory', 'CategoryController@store')->middleware('admin');

Route::put('/editcategory', 'CategoryController@update')->middleware('admin');

Route::post('/deletecategory', 'CategoryController@destroy')->middleware('admin');

// Colores

Route::get('/editcolor', 'ColorController@index')->middleware('admin');

Route::post('/addcolor', 'ColorController@store')->middleware('admin');

Route::put('/editcolor', 'ColorController@update')->middleware('admin');

Route::post('/deletecolor', 'ColorController@destroy')->middleware('admin');


// isAdmin

Route::get('/adminpanel', function() {
  return view('adminpanel');
})->middleware('admin');

// carts

Route::get('/cart', function() {
  return view('cart');

Route::get('/cart', 'CartController@show')->middleware('auth');
});

Route::post('/addToCart', 'CartController@addToCart')->middleware('auth');;

// Auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
