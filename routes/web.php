<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\http\Controllers\PartidaController;

Route::get('/', [PartidaController::class, 'index']);

Route::get('/partida', [PartidaController::class, 'partida']);
Route::get('/partida/{id}', [PartidaController::class, 'show']);

Route::get('/criar-partida', [PartidaController::class, 'criarPartida'])->middleware('auth');
Route::post('/validando-partida', [PartidaController::class, 'store'])->middleware('auth');

Route::get('/dashboard', [PartidaController::class, 'dashboard'])->middleware('auth');

Route::get('/partida/edit/{id}', [PartidaController::class, 'edit'])->middleware('auth');
Route::put('/partida/update/{id}', [PartidaController::class, 'update'])->middleware('auth');
Route::delete('/partida/{id}', [PartidaController::class, 'destroy'])->middleware('auth');

Route::post('partida/join/{id}', [PartidaController::class, 'join'])->middleware('auth');
Route::delete('partida/leave/{id}', [PartidaController::class, 'leave'])->middleware('auth');
