<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReseñaController;
use App\Http\Controllers\TrabajadorController;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', function(Request $request){
    return 'pong';
});


Route::get(('/user/{id}'), [AuthController::class, 'getUser']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/user/{id}', [AuthController::class, 'updateUser']);
Route::post('/verify-email', [AuthController::class, 'verifyEmail']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/trabajador', [TrabajadorController::class, 'store']);
Route::get('/trabajador', [TrabajadorController::class, 'index']);
Route::get('/trabajador/{id}', [TrabajadorController::class, 'getTrabajador']);
Route::patch('/trabajador/{id}/info', [TrabajadorController::class, 'updateInfo']);
Route::post('/trabajador/{id}/images', [TrabajadorController::class, 'updateImages']);

Route::get('/userTrabajador/{id}', [AuthController::class, 'isTrabajador']);

Route::get('/contrato', [ContratoController::class, 'index']);
Route::post('/contrato', [ContratoController::class, 'store']);
Route::get('/contrato/{trabajador_id}/{cliente_id}', [ContratoController::class, 'getContratosByTrabajadorAndCliente']);
Route::get('/contrato/{trabajador_id}', [ContratoController::class, 'getContratosByTrabajador']);
Route::put('/contrato/{id}', [ContratoController::class, 'update']);
Route::patch('/contrato/{id}/status', [ContratoController::class, 'updatePartial']);
Route::delete('/contrato/{id}', [ContratoController::class, 'destroy']);

Route::post('/resenia', [ReseñaController::class, 'store']);
Route::get('/resenia/trabajador/{id}', [ReseñaController::class, 'getReseniaByTrabajId']);
Route::get('/resenia/user/{id}', [ReseñaController::class, 'getReseniaByUserId']);
Route::get('/resenia/{id}', [ReseñaController::class, 'getReseniaById']);

Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'productsByTrabajadorId']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
