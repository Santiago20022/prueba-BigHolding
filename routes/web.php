<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\UserController;
use App\http\Controllers\ComentarioController;
use App\http\Controllers\ReporteController;


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


Auth::routes();


Route::post('/create/estado', [EstadoController::class, 'store']);
Route::get('/get/estados', [EstadoController::class, 'getAll']);

Route::get('/get/tarjetas/{estado_id}', [TarjetaController::class, 'getAll']);
Route::get('/get/tarjeta/{id}', [TarjetaController::class, 'getById']);
Route::post('/create/tarjeta', [TarjetaController::class, 'store']);
Route::post('/edit/tarjeta/{tarjeta_id}', [TarjetaController::class, 'edit']);
Route::get('/get/tarjetas', [TarjetaController::class, 'getAllCards']);
Route::post('/delete/tarjeta/{id}', [TarjetaController::class, 'destroy']);

Route::post('/create/comentario', [ComentarioController::class, 'store']);
Route::get('/get/comentarios/{tarjeta_id}', [ComentarioController::class, 'getAll']);

Route::get('/get/users', [UserController::class, 'getAll']);
Auth::routes();




Route::get('/', [TarjetaController::class, 'index'])->name('tarjeta')->middleware('auth');
Route::get('/home', [TarjetaController::class, 'index'])->name('tarjeta')->middleware('auth');
Route::get('/reporte', [ReporteController::class, 'index'])->name('reporte')->middleware('auth');
