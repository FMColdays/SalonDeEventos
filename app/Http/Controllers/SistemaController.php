<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class SistemaController extends Controller
{

    public function inicio()
    {
        $todos = Paquete::all();
        return view('principal', compact('todos'));
    }
    public function entrada()
    {
        return view('login');
    }

    public function validar(Request $solicitud)
    {
        $usuario = $solicitud->input('usuario');
        $password = $solicitud->input('contraseña');
        if ($usuario == $password) {
            return redirect('cliente');
        } else if ($usuario == "gerente" && $password == "hola") {
            return redirect('gerente');
        }
    }

    public function clienteV()
    {
        return view('principal');
    }
    public function verEventos()
    {
        return view('cliente.eventos');
    }

    public function añadirEvento()
    {
        return view('cliente.agregarevento');
    }


    public function gerenteV()
    {
        return view('gerente.gerentevista');
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
        return view('gerente.agregarusuario');
    }
    public function agregarp()
    {
        return view('gerente.agregarpaquetes');
    }
    public function listap()
    {
        return view('gerente.listadepaquetes');
    }
    public function bono()
    {
        return view('gerente.abonar');
    }
}
