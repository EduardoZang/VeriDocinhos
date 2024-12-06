<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('produtos', ProdutoController::class);

Route::resource('clientes', ClienteController::class);

Route::resource('pedidos', PedidoController::class);