<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; // Necesario para obtener los valores del Auth!!!!
use Illuminate\Support\Facades\Hash; // Necesario para hashear la password!!!!


class UserController extends Controller
{


  public function show() // se muestran los datos del usuario elegido
  {
    return view('/profile');
  }

  public function edit()  // se muestran los datos del usuario elegido para editar
  {
    return view('/edituser');
  }

  public function update(Request $request){ // se muestra el usuario con los campos completos listos para editar. A diferencia de guardar, update lleva tambien la variable $id

    // Declaro las variables de validacion

    $reglas = [
      'name' =>'required|string|min:2|max:40|',
      'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id.',id', // https://laravel.com/docs/5.2/validation#rule-unique , https://laracasts.com/discuss/channels/laravel/how-to-update-unique-email
      'password' => ['nullable', 'min:6'],
    ];

    $mensajes = [
    "required" => "El campo es obligatorio",
    "string" => "El campo debe ser un texto",
    "min" => "El minimo es de :min caracteres",
    "max" => "El maximo es de :max caracteres",

    ];

    $this->validate($request, $reglas,$mensajes);

      // busco el usuario
      $user = User::find(Auth::user()->id);
      $user->name = $request['name']; // alternativa $movie->first_name = $request->first_name;
      if (Auth::user()->email == $request->email){
        $user->email;
      }else{
      $user->email = $request['email'];
      }
      $user->password = Hash::make($request->password);


      //guardo en la base de datos
      $user->save();

      return redirect('/profile');

  }

  public function delete() // borrar el usuario y deslinkear cualquier relacion, en este caso, borra su carrito
  {

    // $cart = Cart::find(Auth::user()->cart_id);
    $user = User::find(Auth::user()->id);


    $user->delete(); // borramos el usuario
    return redirect("/");
  }


}
