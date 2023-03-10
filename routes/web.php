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

Route::post('validar', [SistemaController::class, 'validar'])->name('sesion');
Route::get('cliente', [SistemaController::class, 'clienteV'])->name(("cliente"));
Route::get('gerente', [SistemaController::class, 'gerenteV'])->name(("gerente"));


Route::get('evento', [SistemaController::class, 'verEventos'])->name('evento');
Route::get('tabla', [SistemaController::class, 'mostrar'])->name("tabla");
Route::get('añadir', [SistemaController::class, 'agregar'])->name("añadir");
Route::get('agregarusuario', [SistemaController::class, 'agregaru'])->name(("agregaru"));
Route::get('agregarpaquetes', [SistemaController::class, 'agregarp'])->name(("agregarp"));
Route::get('listadepaquetes', [SistemaController::class, 'listap'])->name(("listap"));
