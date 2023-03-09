<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function entrada()
    {
        return view('usuarios.login');
    }

    public function validar(Request $solicitud)
    {
        $usuario = $solicitud->input('usuario');
        $password = $solicitud->input('contraseña');
        if ($usuario == $password) {
            return view('principal');
        }
        if ($usuario == "gerente" && $password == "hola") {
            return redirect('gerentevista');
        }
    }

    public function añadirEvento()
    {
        return view('conjunto.agregarevento');
    }

    public function verEventos()
    {
        return view('conjunto.eventos');
    }
    public function mostrar()
    {
        return view("gerente.tabla");
    }
    public function agregar()
    {
        return view("gerente.añadirserv");
    }
    public function agregaru()
    {
        return view('usuarios.agregarusuario');
    }

    public function agregarp()
    {
        return view('usuarios.agregarpaquetes');
    }

    public function listap()
    {
        return view('usuarios.listadepaquetes');
    }

    public function salirb()
    {
        return view('usuarios.gerentevista');
    }
}
