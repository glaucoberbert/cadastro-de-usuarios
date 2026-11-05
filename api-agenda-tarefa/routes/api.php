<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\TarefaController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, "login"]);
// NOVO: rota do cadastro (POST http://127.0.0.1:8000/api/register)
Route::post('register', [AuthController::class, "register"]);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('tarefas', TarefaController::class);