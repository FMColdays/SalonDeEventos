<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Models\Imagen;
use Illuminate\Support\Facades\Hash;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $servicio->costo = $request->input('costo');
        $servicio->save();

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            $imgenU = new Imagen();
            $imgenU->imagenMi = $ruta . $nombreimagen;
            $imgenU->imagenable_id = $servicio->id;
            $imgenU->imagenable_type = Servicio::class;
            $imgenU->save();
        }

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicioRequest $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
