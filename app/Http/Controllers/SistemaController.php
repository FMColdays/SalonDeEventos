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
        } else {
            echo "error";
        }
    }

    public function verEventos()
    {
        return view('conjunto.eventos');
    }
}
