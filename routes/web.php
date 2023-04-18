<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect('inicio');
});


Route::get('inicio', [SistemaController::class, 'inicio'])->name(('inicio'))->middleware('no.auth');

//Sistem de logeo y validación
Route::get('login', [SistemaController::class, 'login'])->name(('login'))->middleware('no.auth');
Route::post('validar', [SistemaController::class, 'validar'])->name('sesion');

//Sistema de registro
Route::get('registrarse', [SistemaController::class, 'registro'])->name(('registrarse'))->middleware('no.auth');
Route::post('registrar', [SistemaController::class, 'registrar'])->name('registrar')->middleware('no.auth');

//Validar que rol tiene el usuario
Route::get('@me', [SistemaController::class, 'tipoVistaUsuario'])->name(("@me"))->middleware('auth');

//Cerrar sesión
Route::get('cerrar_sesion', [SistemaController::class, 'cerrar_sesion'])->name(("cerrar_sesion"));


Route::resource('usuarios', UsuarioController::class)->middleware('auth');
Route::resource('paquetes', PaqueteController::class)->middleware('auth')->except('show');
Route::get('/album/{paquete}', [PaqueteController::class, 'show'])->name('paquetes.show');
Route::resource('servicios', ServicioController::class)->middleware('auth');
Route::resource('eventos', EventoController::class)->middleware('auth');

Route::get('abonar', [SistemaController::class, 'bono'])->name(("abonarserv"));
