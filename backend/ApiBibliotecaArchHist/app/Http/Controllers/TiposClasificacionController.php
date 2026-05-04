<?php

namespace App\Http\Controllers;

use App\Models\TiposClasificacion;
use Illuminate\Http\Request;

class TiposClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(TiposClasificacion::latest()->paginate()); 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  response(TiposClasificacion::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TiposClasificacion $tipos_clasificacion)
    {
        return response($tipos_clasificacion);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiposClasificacion $tipos_clasificacion)
    {
        return response($tipos_clasificacion->update($request->all()),200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiposClasificacion $tiposClasificacion)
    {
        return response($tiposClasificacion->delete(),200);
    }
}
