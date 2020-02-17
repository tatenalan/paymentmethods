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

Route::get('/addproduct', 'ProductController@new');

Route::post('/addproduct', 'ProductController@store');

Route::get('/producto/{id}', 'ProductController@show');

Route::get('/editproduct/{id}', 'ProductController@edit');

Route::put('/editproduct/{id}', 'ProductController@update');

Route::post('/delete/product/{id}', 'ProductController@deleteproduct');

Route::post('/addimage', 'ProductController@addImage');

Route::post('/deleteimage', 'ProductController@deleteImage');

Route::get('/productos/talle/{talle}', 'ProductController@searchBySize');

Route::get('/searchproduct', 'ProductController@showallproducts');

Route::get('/searchproduct/search', 'ProductController@searchProductByName');

Route::get('/searchproduct/search', 'ProductController@searchProductByModel');

// Route::get('/searchproduct/search', 'ProductController@searchProductByBrand');


// users

Route::get('/profile', 'UserController@show')->middleware('auth');

Route::get('/edituser', 'UserController@edit')->middleware('auth');

Route::post('/deleteuser', 'UserController@delete')->middleware('auth');

Route::put('/profile', 'UserController@update')->middleware('auth');

// Marcas

Route::get('/editbrand', 'BrandController@index');

Route::post('/addbrand', 'BrandController@store');

Route::put('/editbrand', 'BrandController@update');

Route::post('/deletebrand', 'BrandController@destroy');


// Categorias

Route::get('/editcategory', 'CategoryController@index');

Route::post('/addcategory', 'CategoryController@store');

Route::put('/editcategory', 'CategoryController@update');

Route::post('/deletecategory', 'CategoryController@destroy');

// Categorias

Route::get('/editcolor', 'ColorController@index');

Route::post('/addcolor', 'ColorController@store');

Route::put('/editcolor', 'ColorController@update');

Route::post('/deletecolor', 'ColorController@destroy');


// isAdmin

Route::get('/controlpanel', function() {
  return view('controlpanel');
});

// carts

Route::get('/cart', function() {
  return view('cart');
});

Route::post('/addToCart', 'CartController@addToCart');

// Auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
