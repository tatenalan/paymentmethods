<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $colors = Color::all();
      $vac = compact('colors');
      return view('/editcolor',$vac);
    }

    public function store(Request $request)
    {
      $reglas = [
      'name' => 'required|string|min:1|max:40',
      ];
      $mensajes = [
        "name.required" => "Ingrese el nombre del color",
        "name.string" => "Por favor ingrese un color valido",
        "name.min" => "El nombre del color es muy corto",
        "name.max" => "El nombre del color es muy largo"
      ];
      $this->validate($request, $reglas, $mensajes);
      $color = new Color;
      $color->name=$request->name;
      $color->save();
      return \Redirect::back();
    }

    public function update(Request $request)
    {
      $reglas = [
      'name' => 'required|string|min:1|max:50',
      ];
      $mensajes = [
        "name.required" => "Ingrese el nombre del color",
        "name.string" => "Por favor ingrese un nombre valido",
        "name.min" => "El nombre del color es muy corto",
        "name.max" => "El nombre del color es muy largo"
      ];
      $this->validate($request, $reglas, $mensajes);

      $color = Color::find($request->id);
      $color->name = $request->name;
      $color->save();

      return \Redirect::back();
    }

    public function destroy(Request $request)
    {
      $color = Color::find($request->id);
      $color->delete();
      return \Redirect::back();
    }
}
