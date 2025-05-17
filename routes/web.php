<?php

use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\ItemCarrinhoController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/carrinho', [CarrinhoController::class, 'store'])->name('carrinho.store');
Route::get('/carrinho', [CarrinhoController::class, 'show'])->name('carrinho.show');

Route::post('/pedido', [PedidoController::class, 'comprar'])->name('pedido.comprar');

Route::get('/cartas', [CartaController::class, 'index'])->name('cartas.cadastro');
Route::post('/cartas', [CartaController::class, 'store'])->name('cartas.store');

Route::delete('/carrinho/{item}', [ItemCarrinhoController::class, 'destroy'])->name('item-carrinho.destroy');

Route::get('/perfil/{id}', [PerfilController::class, 'show'])->name('perfil');
