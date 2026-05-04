<?php

namespace App\Http\Controllers;

use App\Models\CatFondos;
use Illuminate\Http\Request;

class CatFondosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response(CatFondos::latest()->paginate()); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  response(CatFondos::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatFondos $cat_fondo)
    {
        return response($cat_fondo);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatFondos $cat_fondo)
    {
        return response($cat_fondo->update($request->all()),200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatFondos $catFondos)
    {
        return response($catFondos->delete(),200);
    }
}
