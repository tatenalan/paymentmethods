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
    public function index()
    {
      $brands = Brand::all();
      $vac = compact('brands');
      return view('/editbrands',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
       return view('/editbrands',$vac);
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
    public function edit(Request $request)
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
      return view('/editbrands',$vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
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
      return view('/editbrands', compact('brands'));
    }
}
