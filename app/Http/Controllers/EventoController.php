<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', App\Models\Evento::class);
        $eventos = Evento::with('paquete', 'servicios')->get();
        return view('eventos.index', compact('eventos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', App\Models\Evento::class);
        $servicios = Servicio::where('estado', '1')->get();
        $paquetes = Paquete::where('estado', '1')->get();
        return view('eventos.create', compact('paquetes', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {

        $usuario = Auth::user();
        $paquete = Paquete::find($request->input('paquete_id'));
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->horaI = $request->input('horaI');
        $evento->horaF = $request->input('horaF');
        $evento->capacidad = $request->input('capacidad');
        $evento->costo = $request->input('costo');
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($request->input('servicios'));

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
        $this->authorize('update', $evento);
        $evento->load('servicios');
        $servicios = Servicio::where('estado', '1')->get();
        $paquetes = Paquete::where('estado', '1')->get();
        return view('eventos.edit', compact('evento', 'servicios', 'paquetes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $this->authorize('update', $evento);
        $cliente = Auth::user();
        $paquete = Paquete::find($request->input('paquete_id'));
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->horaI = $request->input('horaI');
        $evento->horaF = $request->input('horaF');
        $evento->estado = $request->input('estado');
        $evento->capacidad = $request->input('capacidad');
        $evento->costo = $request->input('costo');
        $evento->cliente_id = $cliente->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($request->input('servicios'));

        return redirect(route('eventos.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $this->authorize('delete', $evento);
        $evento->delete();
        return redirect(route('eventos.index'));
    }
}
