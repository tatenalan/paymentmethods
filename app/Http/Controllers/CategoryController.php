<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      $vac = compact('categories');
      return view('/editcategory',$vac);
    }

    public function store(Request $request)
    {
      $reglas = [
      'name' => 'required|string|min:1|max:50',
      ];
      $mensajes = [
        "name.required" => "Ingrese el nombre de la categoria",
        "name.string" => "Por favor ingrese un nombre valido",
        "name.min" => "El nombre de la categoria es muy corto",
        "name.max" => "El nombre de la categoria es muy largo"
      ];
      $this->validate($request, $reglas, $mensajes);
      $category = new Category;
      $category->name=$request->name;
      $category->save();
      return \Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $reglas = [
      'name' => 'required|string|min:1|max:50',
      ];
      $mensajes = [
        "name.required" => "Ingrese el nombre de la categoria",
        "name.string" => "Por favor ingrese un nombre valido",
        "name.min" => "El nombre de la categoria es muy corto",
        "name.max" => "El nombre de la categoria es muy largo"
      ];
      $this->validate($request, $reglas, $mensajes);

      $category = Category::find($request->id);
      $category->name = $request->name;
      $category->save();

      return \Redirect::back();
    }

    public function destroy(Request $request)
    {
      $category = Category::find($request->id);
      $category->delete();
      return \Redirect::back();
    }
}
