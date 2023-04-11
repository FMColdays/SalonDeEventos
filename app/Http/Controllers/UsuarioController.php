<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Imagen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios =  Usuario::all();
        return view("usuarios.index", compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("usuarios.agregar");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->nacimiento = $request->input('nacimiento');
        $usuario->contraseña = Hash::make($request->input('contraseña'));
        $usuario->rol = $request->input('rol');
        $usuario->save();

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            $imgenU = new Imagen();
            $imgenU->imagenMi = $ruta . $nombreimagen;
            $imgenU->imagenable_id = $usuario->id;
            $imgenU->imagenable_type = Usuario::class;
            $imgenU->save();
        }

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->nacimiento = $request->input('nacimiento');
        $usuario->contraseña = $request->input('contraseña');
        $usuario->rol = $request->input('rol');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            if ($usuario->imagenMo) {
                $usuario->imagenMo()->update([
                    'imagenMi' => $ruta . $nombreimagen,
                    'imagenable_id'  => $usuario->id,
                    'imagenable_type'  => Usuario::class,
                ]);
            } else {
                $usuario->imagenMo()->create([
                    'imagenMi' => $ruta . $nombreimagen,
                    'imagenable_id'  => $usuario->id,
                    'imagenable_type'  => Usuario::class,
                ]);
            }          
        }
        $usuario->save();
        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect(route('usuarios.index'));
    }
}
