<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Paquete::all();
        return view("paquetes.index", compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paquetes.agregarpaquetes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaqueteRequest $request)
    {
        $nuevo = new Paquete();

        $nuevo->nombre = $request->input('nombre');
        $nuevo->fecha = $request->input('fecha');
        $nuevo->ubicacion = $request->input('ubicacion');
        $nuevo->capacidad = $request->input('capacidad');
        $nuevo->costo = $request->input('costo');
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->servicios = $request->input('servicios');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            $nuevo->imagen = $ruta . $nombreimagen;
        }

        $nuevo->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paquete $paquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paquete $paquete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaqueteRequest $request, Paquete $paquete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        //
    }
}
