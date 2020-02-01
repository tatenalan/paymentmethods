<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() // se muestran los datos del producto elegido listo para editar
    {
      $brands = Brand::all();
      $vac = compact('brands');
      return view('/editbrand',$vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // agrega una marca y te redirige a la lista de marcas
    {
       $reglas = [
       'name' => 'required|string|min:1|max:50',
       ];
       $mensajes = [
         "name.required" => "Ingrese el nombre de la marca",
         "name.string" => "Por favor ingrese un nombre valido",
         "name.min" => "El nombre de la marca es muy corto",
         "name.max" => "El nombre de la marca es muy largo"
       ];
       $this->validate($request, $reglas, $mensajes);
       $brand = new Brand;
       $brand->name=$request->name;
       $brand->save();
       $brands = Brand::all();
       $vac = compact('brands');
       return view('/editbrand',$vac);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) // se muestran las marcas con los campos completos listas para editar.
    {
      $reglas = [
      'name' => 'required|string|min:1|max:50',
      ];
      $mensajes = [
        "name.required" => "Ingrese el nombre de la marca",
        "name.string" => "Por favor ingrese un nombre valido",
        "name.min" => "El nombre de la marca es muy corto",
        "name.max" => "El nombre de la marca es muy largo"
      ];
      $this->validate($request, $reglas, $mensajes);
      $brand = Brand::find($request->id);
      $brand->name = $request->name;
      $brand->save();

      $brands = Brand::all();
      $vac = compact('brands');
      return view('/editbrand',$vac);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $brand = Brand::find($request->id);
      $brand->delete();
      $brands = Brand::All();
      return view('/editbrand', compact('brands'));
    }
}
