<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;
use App\Models\Album;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

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
        $paquete = new Paquete();
        $paquete->nombre = $request->input('nombre');
        $paquete->capacidad = $request->input('capacidad');
        $paquete->costo = $request->input('costo');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->save();

        if ($request->hasFile('imagen')) {
            $imageneF = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imageneF->getClientOriginalName();
            $carga = $request->file('imagen')->move($ruta, $nombreimagen);
            $imgenP = new Imagen();
            $imgenP->imagenMi = $ruta . $nombreimagen;
            $imgenP->imagenable_id = $paquete->id;
            $imgenP->imagenable_type = Paquete::class;
            $imgenP->save();
        }

        return redirect(route('paquetes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paquete $paquete)
    {
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
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            if ($paquete->imagenMo) {
                $paquete->imagenMo()->update([
                    'imagenMi' => $ruta . $nombreimagen,
                    'imagenable_id'  => $paquete->id,
                    'imagenable_type'  => Paquete::class,
                ]);
            } else {
                $paquete->imagenMo()->create([
                    'imagenMi' => $ruta . $nombreimagen,
                    'imagenable_id'  => $paquete->id,
                    'imagenable_type'  => Paquete::class,
                ]);
            }
        }
        $paquete->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        $paqueteimg  = Album::where('paquete_id', $paquete->id)->get();

        foreach ($paqueteimg as $imagen) {
            $url = str_replace('storage', 'public', $imagen->album);
            Storage::delete($url);
        }


        $paquete->delete();
        return redirect(route('paquetes.index'));
    }
}
