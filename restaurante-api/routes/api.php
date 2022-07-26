<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\MesaController;

use App\Http\Controllers\CardapioController;

use App\Http\Controllers\CozinheiroController;

use App\Http\Controllers\GarcomController;

use App\Http\Controllers\CozLoginController;

use App\Http\Controllers\GarLoginController;

use App\Http\Controllers\CozLogoutController;

use App\Http\Controllers\GarLogoutController;

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

Route::get('cozinheiros', [CozinheiroController::class, 'getAllCozinheiros']);
Route::get('cozinheiros/{id}', [CozinheiroController::class, 'getCozinheiro']);
Route::post('cozinheiros', [CozinheiroController::class, 'createCozinheiro']);
Route::put('cozinheiros/{id}', [CozinheiroController::class, 'updateCozinheiro']);
Route::delete('cozinheiros/{id}', [CozinheiroController::class, 'deleteCozinheiro']);

Route::get('garcoms', [GarcomController::class, 'getAllGarcoms']);
Route::get('garcoms/{id}', [GarcomController::class, 'getGarcom']);
Route::post('garcoms', [GarcomController::class, 'createGarcom']);
Route::put('garcoms/{id}', [GarcomController::class, 'updateGarcom']);
Route::delete('garcoms/{id}', [GarcomController::class, 'deleteGarcom']);

Route::post('cozinheiros/login', [CozLoginController::class, 'login']);
Route::post('garcoms/login', [GarLoginController::class, 'login']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('cozinheiros/logout', [CozLogoutController::class, 'perform']);
    Route::get('garcoms/logout', [GarLogoutController::class, 'perform']);
});
