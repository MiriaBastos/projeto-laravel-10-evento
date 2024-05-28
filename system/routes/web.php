<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventosController;
use App\Models\Evento;

Route::get('/', [EventosController::class, 'index']);

Route::get('/eventos/create', [EventosController::class, 'create'])->middleware('auth');

Route::get('/eventos/{id}', [EventosController::class, 'show']);

Route::post('/eventos', [EventosController::class, 'store']);

Route::get('/eventos/contatos', [EventosController::class, 'contatos']);

Route::get('/dashboard', [EventosController::class, 'dashboard'])->middleware('auth');

Route::delete('/eventos/{id}', [EventosController::class, 'destroy'])->middleware('auth');

Route::get('/eventos/edit/{id}', [EventosController::class, 'edit'])->middleware('auth');

Route::put('/eventos/update/{id}', [EventosController::class, 'uptade'])->middleware('auth');

Route::match(['get', 'post'],'/eventos/join/{id}', [EventosController::class, 'joinEvento'])->middleware('auth');
