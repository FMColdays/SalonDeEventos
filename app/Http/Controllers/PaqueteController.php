<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;
use App\Models\Servicio;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::all();
        return view("paquetes.index", compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::where('estado', '1')->get();
        return view('paquetes.agregar', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaqueteRequest $request)
    {
        $paquete = new Paquete();
        $paquete->nombre = $request->input('nombre');
        $paquete->capacidad = $request->input('capacidad');
        $paquete->costo = $request->input('costo');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->save();

        return redirect(route('paquetes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paquete $paquete)
    {
        if (auth()->user()) {

           return view('paquetes.show');
        } elseif ($paquete->estado == '1') {
        
            return view('paquetes.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paquete $paquete)
    {
        return view('paquetes.editar', compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaqueteRequest $request, Paquete $paquete)
    {
        $paquete->nombre = $request->input('nombre');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->costo = $request->input('costo');
        $paquete->capacidad = $request->input('capacidad');
        $paquete->estado = $request->input('estado');
      
        $paquete->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        $paquete->delete();
        return redirect(route('paquetes.index'));
    }
}
