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
        $this->authorize('viewAny', App\Models\Paquete::class);
        $paquetes = Paquete::all();
        return view("paquetes.index", compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', App\Models\Paquete::class);
        return view('paquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaqueteRequest $request)
    {
        $this->authorize('create', App\Models\Paquete::class);
        $paquete = new Paquete();
        $paquete->nombre = $request->input('nombre');
        $paquete->capacidad = $request->input('capacidad');
        $paquete->costo = $request->input('costo');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->gerente_id = auth()->user()->id;
        $paquete->save();

        return redirect(route('paquetes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paquete $paquete)
    {
        $this->authorize('publicado', $paquete);
        return view('paquetes.show', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paquete $paquete)
    {
        $this->authorize('update', $paquete);
        return view('paquetes.edit', compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaqueteRequest $request, Paquete $paquete)
    {
        $this->authorize('update', $paquete);
        $paquete->nombre = $request->input('nombre');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->costo = $request->input('costo');
        $paquete->capacidad = $request->input('capacidad');
        $paquete->estado = $request->input('estado');
        $paquete->gerente_id = auth()->user()->id;
        $paquete->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        $this->authorize('delete', $paquete);
        $paquete->delete();
        return redirect(route('paquetes.index'));
    }
}
