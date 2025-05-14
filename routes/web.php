<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;

Route::apiResource('carta', CartaController::class);

Route::apiResource('pedido', PedidoController::class);

Route::apiResource('usuario', UsuarioController::class);
