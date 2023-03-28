<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Usuario::all();
        return view("usuarios.index", compact('todos'));
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
        $nuevo = new Usuario();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->usuario = $request->input('usuario');
        $nuevo->nacimiento = $request->input('nacimiento');
        $nuevo->apellidos = $request->input('apellidos');
        $nuevo->contraseña = $request->input('contraseña');
        $nuevo->rol = $request->input('rol');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            $nuevo->imagen = $ruta . $nombreimagen;
        }

        $nuevo->save();
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
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->nacimiento = $request->input('nacimiento');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->contraseña = $request->input('contraseña');
        $usuario->rol = $request->input('rol');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = 'imagenes/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $carga =  $request->file('imagen')->move($ruta, $nombreimagen);
            $usuario->imagen = $ruta . $nombreimagen;
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
