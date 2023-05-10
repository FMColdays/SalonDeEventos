<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;


class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', App\Models\Servicio::class);
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicioRequest $request)
    {
        $servicio = new Servicio();
        $servicio->nombre = $request->input('nombre');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->gerente_id = auth()->user()->id;
        $servicio->costo = $request->input('costo');
        $servicio->save();

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        if (auth()->user()) {
            return view('servicios.show');
        } elseif ($servicio->estado == '1') {
            return view('servicios.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicioRequest $request, Servicio $servicio)
    {
        $servicio->nombre = $request->input('nombre');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->costo = $request->input('costo');
        $servicio->estado = $request->input('estado');

        $servicio->save();
        return redirect(route('servicios.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        $this->authorize('delete', $servicio);
        $servicio->delete();
        return redirect(route('servicios.index'));
    }
}
