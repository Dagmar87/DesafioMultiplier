<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\MesaController;

use App\Http\Controllers\CardapioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('clientes', [ClienteController::class, 'getAllClientes']);
Route::get('clientes/{id}', [ClienteController::class, 'getCliente']);
Route::post('clientes', [ClienteController::class, 'createCliente']);
Route::put('clientes/{id}', [ClienteController::class, 'updateCliente']);
Route::delete('clientes/{id}', [ClienteController::class, 'deleteCliente']);

Route::get('mesas', [MesaController::class, 'getAllMesas']);
Route::get('mesas/{id}', [MesaController::class, 'getMesa']);
Route::post('mesas', [MesaController::class, 'createMesa']);
Route::put('mesas/{id}', [MesaController::class, 'updateMesa']);
Route::delete('mesas/{id}', [MesaController::class, 'deleteMesa']);

Route::get('cardapios', [CardapioController::class, 'getAllItens']);
Route::get('cardapios/{id}', [CardapioController::class, 'getItem']);
Route::post('cardapios', [CardapioController::class, 'createItem']);
Route::put('cardapios/{id}', [CardapioController::class, 'updateItem']);
Route::delete('cardapios/{id}', [CardapioController::class, 'deleteItem']);
