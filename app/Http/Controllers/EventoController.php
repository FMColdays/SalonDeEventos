<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Paquete;
use App\Models\Servicio;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::all();
        $paquetes = Paquete::all();
        return view('eventos.create', compact('paquetes', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->horaI = $request->input('horaI');
        $evento->horaF = $request->input('horaF');
        $evento->capacidad = $request->input('capacidad');
        $evento->save();

        return redirect(route('eventos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        if (auth()->user()) {

            return view('eventos.show');
        } elseif ($evento->estado == '1') {

            return view('eventos.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->horaI = $request->input('horaI');
        $evento->horaF = $request->input('horaF');
        $evento->capacidad = $request->input('capacidad');
        $evento->estado = $request->input('estado');
        $evento->save();

        return redirect(route('eventos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect(route('eventos.index'));
    }
}
