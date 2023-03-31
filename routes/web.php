<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect('inicio');
});


Route::get('inicio', [SistemaController::class, 'inicio'])->name(('inicio'));

//Sistem de logeo y validación
Route::get('login', [SistemaController::class, 'login'])->name(('login'));
Route::post('validar', [SistemaController::class, 'validar'])->name('sesion');

//Sistema de registro
Route::get('registrarse', [SistemaController::class, 'registro'])->name(('registrarse'));
Route::post('registrar', [SistemaController::class, 'registrar'])->name('registrar');

 //Validar que rol tiene el usuario
Route::get('@me', [SistemaController::class, 'tipoVistaUsuario'])->name(("@me"))->middleware('auth');

//Cerrar sesión
Route::get('cerrar_sesion', [SistemaController::class, 'cerrar_sesion'])->name(("cerrar_sesion"));


Route::resource('usuarios', UsuarioController::class);
Route::resource('paquetes', PaqueteController::class);
Route::resource('eventos', EventoController::class);

Route::get('agregarPaquete', [SistemaController::class, 'añadirEvento'])->name('añadirEventC');
Route::get('tabla-servicios', [SistemaController::class, 'mostrar'])->name("tablaserv");
Route::get('añadir-servicio', [SistemaController::class, 'agregar'])->name("añadirserv");
Route::get('abonar', [SistemaController::class, 'bono'])->name(("abonarserv"));
