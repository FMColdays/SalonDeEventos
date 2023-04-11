<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paquete;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SistemaController extends Controller
{

    public function inicio()
    {
        $paquetes = Paquete::all();
        return view('principal', compact('paquetes'));
    }


    //Vista login y registro
    public function login()
    {
        return view('login');
    }
    public function registro()
    {
        return view('registrarse');
    }

    //Sistem de registro de nuevo usurio
    public function registrar(Request $solicitud)
    {
        $nombre = $solicitud->input('nombre');
        $usuario = $solicitud->input('usuario');
        $contraseña = $solicitud->input('contraseña');
        $nuevo = new Usuario();
        $nuevo->nombre = $nombre;
        $nuevo->usuario = $usuario;
        $nuevo->contraseña = Hash::make($contraseña);
        $nuevo->save();
        return redirect('inicio');
    }

    //Sistema de validación de usuario
    public function validar(Request $solicitud)
    {
        $usuario = $solicitud->input('usuario');
        $contraseña = $solicitud->input('contraseña');

        $encontrado = Usuario::where('usuario', $usuario)->first();

        if (is_null($encontrado)) {
           return redirect('login')
           ->with(['mensaje' => 'Error, usuario no encontrado']);
        } else {
            $contraseña_bd = $encontrado->contraseña;
            $conincide = Hash::check($contraseña, $contraseña_bd);

            if ($conincide) {
                Auth::login($encontrado);
                return redirect(route('@me'));
            } else {
               return redirect('login')
                ->with(['mensaje' => 'Error, contraseña incorrecta']);;
            }
        }
    }

    public function tipoVistaUsuario()
    {
        $tipo_de_usurio = Auth::user()->rol;
        $paquetes = Paquete::all();
     
        
        if ($tipo_de_usurio == "Gerente") {
            return view('gerente.index', compact('paquetes'));
        }else{
            return view('cliente.index', compact('paquetes'));
        }
        
    }

    public function cerrar_sesion(){
        Auth::logout();
        return redirect('inicio');
    }

}
