<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;
use App\Models\Imagen;


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
        return view('paquetes.agregar');
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
            $imageneF = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imageneF->getClientOriginalName();
            $mover = $request->file('imagen')->move($ruta, $nombreimagen);
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
        $imagenes = $paquete->imagenes()->paginate(10);

        return view('album.index', compact('imagenes'));
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
