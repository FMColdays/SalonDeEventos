<?php

use App\Http\Controllers\PaqueteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect('inicio');
});


Route::get('inicio', [SistemaController::class, 'inicio'])->name(('inicio'));
Route::get('login', [SistemaController::class, 'entrada'])->name(('login'));
Route::post('validar', [SistemaController::class, 'validar'])->name('sesion');

Route::get('cliente', [SistemaController::class, 'clienteV'])->name(("cliente"));
Route::get('gerente', [SistemaController::class, 'gerenteV'])->name(("gerente"));

Route::resource('usuarios', UsuarioController::class);
Route::resource('paquetes', PaqueteController::class);



Route::get('evento', [SistemaController::class, 'verEventos'])->name('evento');
Route::get('agregarPaquete', [SistemaController::class, 'añadirEvento'])->name('añadirEventC');
Route::get('tabla-servicios', [SistemaController::class, 'mostrar'])->name("tablaserv");
Route::get('añadir-servicio', [SistemaController::class, 'agregar'])->name("añadirserv");
Route::get('abonar', [SistemaController::class, 'bono'])->name(("abonarserv"));
