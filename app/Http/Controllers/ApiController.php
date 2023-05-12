<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Gerente;
use App\Models\Paquete;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function paquetes(Request $request)
    {
        $paquetes = Paquete::all();
        return response()->json($paquetes);
    }
    public function usuarios()
    {
        $gerentes = Gerente::all();
        $cliente = Cliente::all();
        $usuarios = $gerentes->concat($cliente);
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $gerente = new Gerente();
        $gerente->fill($request->all());
        $gerente->contraseña = Hash::make($request->contraseña);
        $gerente->save();

        return response()->json([
            'res' => true,
            'message' => "Usuario creado correctamente"
        ], 200);
    }

    public function login(Request $request)
    {
        $usuario = Gerente::where('usuario', $request->usuario)->first();
        if (!is_null($usuario) && Hash::check($request->contraseña, $usuario->contraseña)) {
            $token = $usuario->createToken("example");
            $usuario->api_token =  $token->plainTextToken;
            $usuario->save();
            return response()->json([
                'res' => true,
                'token' => $token->plainTextToken,
                'message' => 'Bienvenido al sistema'
            ], 200);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'Usuario incorrecto'
            ], 200);
        }
    }
}
