<?php

namespace App\Http\Controllers;

use App\Models\Cliente as Cliente;
use App\Models\Evento;
use App\Models\Gerente;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class ApiController extends Controller
{
    public function paquetes()
    {
        $paquetesOn = [];
    
        $paquetes = Paquete::with('imagenMo')->get();
    
        if (Auth::user() instanceof Cliente) {
            foreach ($paquetes as $paquete) {
                if ($paquete->estado == 1) {
                    $paquetesOn[] = $paquete->toArray();
                }
            }
            return response()->json($paquetesOn);
        }
    
        return response()->json($paquetes);
    }
    

    public function usuarios()
    {
        if (Auth::user()  instanceof Cliente) {
            return response()->json([
                'res' => false,
                'message' => 'No tienes permiso para esto'
            ], 400);
        } else {
            $gerentes = Gerente::with('imagenMo')->get();
            $clientes = Cliente::with('imagenMo')->get();
            $usuarios = $gerentes->concat($clientes);
            return response()->json($usuarios);
        }
    }

    public function servicios()
    {
        $serviciosOn = [];
        $servicios = Servicio::with('imagenMo')->get();
        if (Auth::user()  instanceof Cliente) {
            foreach ($servicios as $servicio) {
                if ($servicio->estado == 1) {
                    $serviciosOn[] = $servicio;
                }
            }
            return response()->json($serviciosOn);
        }
        return response()->json($servicios);
    }

    public function eventos()
    {
        $miEvento = [];
        $eventos = Evento::with('imagenMo')->get();
        if (Auth::user()  instanceof Cliente) {
            foreach ($eventos as $evento) {
                if ($evento->cliente_id == auth()->user()->id) {
                    $miEvento[] = $evento;
                }
            }
            return response()->json($miEvento);
        }
        return response()->json($eventos);
    }


    public function login(Request $request)
    {
        $usuario = Gerente::where('usuario', $request->usuario)->first();
        if (is_null($usuario)) {
            $usuario = Cliente::where('usuario', $request->usuario)->first();
        }


        if (!is_null($usuario) && Hash::check($request->contraseña, $usuario->contraseña)) {

            $token = $usuario->createToken('token_api');
            $accessToken = $token->plainTextToken;
            $expiresAt = now()->addMinutes(10);
            $personalAccessToken = PersonalAccessToken::findToken($accessToken);
            $personalAccessToken->forceFill([
                //'expires_at' => $expiresAt,
                'abilities' => ['create']
            ])->save();

            return response()->json([
                'res' => true,
                'token' =>  $accessToken,
                'expira' => $expiresAt,
                'message' => 'Bienvenido al sistema'
            ], 200);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'Usuario incorrecto'
            ], 400);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'res' => true,
            'message' => 'Se cerro sesión correctamente'
        ], 200);
    }
}
