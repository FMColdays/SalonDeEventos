<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Paquete $paquete)
    {
        if ($paquete::class == Paquete::class) {
            $p = Paquete::find($paquete->id);
            $imagenes = $p->albumMo()->paginate(10); 
            return view('album.index', compact('imagenes', 'id'));  
        }else{
            $servicio = Servicio::find($paquete->id);
            $imagenes = $servicio->albumMo()->paginate(10);  
            return view('album.index', compact('imagenes', 'id'));
        }

      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $mo)
    {
        return view('album.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id, $mo)
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

        $album = new Album();
        
    
        $album->album_img = '/storage/album/' . $nombre;
        $album->albumi_id = $id;
        $album->albumi_type = $id;
        $album->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($img)
    {
        $imagen = Album::find($img);

        $url = str_replace('storage', 'public', $imagen->album);
        Storage::delete($url);

        $imagen->delete();
        return  redirect()->back()->with('eliminado', 'si');
    }
}
