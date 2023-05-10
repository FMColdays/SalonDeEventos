<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Cliente;
use App\Models\Gerente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function index()
    {
        $gerentes =  Gerente::all();
        $clientes = Cliente::all();
        $usuarios = $gerentes->concat($clientes);
        return view("usuarios.index", compact('usuarios'));
    }

    public function create()
    {
        return view("usuarios.agregar");
    }

    public function store(StoreUsuarioRequest $request)
    {
        if ($request->input('rol') == 'Gerente') $usuario = new Gerente();
        else  $usuario = new Cliente();

        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->nacimiento = $request->input('nacimiento');
        $usuario->contraseña = Hash::make($request->input('contraseña'));
        $usuario->save();

        return redirect(route('usuarios.index'));
    }

    public function show(Usuario $usuario)
    {
        //
    }

    public function edit($tipoUsuario, $id)
    {
        if ($tipoUsuario == 'Gerente') {
            $usuario = Gerente::where('id', $id)->first();
            if (is_null($usuario)) return view('errors.404');
        } else {
            $usuario = Cliente::where('id', $id)->first();
            if (is_null($usuario)) return view('errors.404');
        }

        return view('usuarios.editar', compact('usuario', 'tipoUsuario'));
    }

    public function update(UpdateUsuarioRequest $request, $tipoUsuario, $id)
    {
        if ($tipoUsuario == 'Gerente') {
            $usuario = Gerente::where('id', $id)->first();
        } else {
            $usuario = Cliente::where('id', $id)->first();
        }

        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->nacimiento = $request->input('nacimiento');
        $usuario->contraseña = $request->input('contraseña');

        $usuario->save();
        return redirect(route('usuarios.index'));
    }

    public function destroy($tipoUsuario, $id)
    {
        if ($tipoUsuario == 'Gerente') {
            $usuario = Gerente::where('id', $id)->first();
        } else {
            $usuario = Cliente::where('id', $id)->first();
        }

        $usuario->delete();
        return redirect(route('usuarios.index'));
    }
}
