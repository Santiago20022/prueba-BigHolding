<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\UserController;


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

Route::get('/', [HomeController::class, 'index']);
Route::post('/create/estado', [EstadoController::class, 'store']);
Route::get('/get/estados', [EstadoController::class, 'getAll']);

Route::get('/get/tarjetas/{estado_id}', [TarjetaController::class, 'getAll']);
Route::post('/create/tarjeta', [TarjetaController::class, 'store']);

Route::get('/get/users', [UserController::class, 'getAll']);
Auth::routes();

Route::get('/home', [TarjetaController::class, 'index'])->name('tarjeta');

