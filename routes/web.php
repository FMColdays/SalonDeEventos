<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('login', [SistemaController::class, 'entrada'])->name(('login'));
Route::post('@me', [SistemaController::class, 'validar'])->name('sesion');
Route::get('evento', [SistemaController::class, 'verEventos'])->name('evento');
Route::get('gerente', [SistemaController::class, 'mostrar'])->name("gerente");
Route::get('añadir', [SistemaController::class, 'agregar'])->name("añadir");
Route::post('validar', [SistemaController::class, 'validar'])->name('sesion');
Route::get('/usuarios/agregarusuario', [SistemaController::class, 'agregaru'])->name(("agregaru"));
Route::get('/usuarios/agregarpaquetes', [SistemaController::class, 'agregarp'])->name(("agregarp"));
Route::get('/usuarios/listadepaquetes', [SistemaController::class, 'listap'])->name(("listap"));
Route::get('/usuarios/gerentevista', [SistemaController::class, 'salirb'])->name(("salirb"));
