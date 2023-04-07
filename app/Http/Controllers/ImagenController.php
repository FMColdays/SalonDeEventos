<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'file' => 'required|image'
        ]);

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
        $ruta = storage_path() . '\app\public\album/' . $nombre;

        Image::make($request->file('file'))
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $album = new Imagen();
        $album->paquete_id = 2;
        $album->imagen = '/storage/album/' . $nombre;
        $album->save();
        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        return view('album.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        return view('album.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        //
    }
}
