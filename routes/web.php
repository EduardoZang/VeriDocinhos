<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('produtos', ProdutoController::class);

//Código questão 1:
Route::post('/produtos/search', [ProdutoController::class, 'search'])->name('produtos.search');

//Código questão 3:
Route::get('/produtos/relatorio', [ProdutoController::class, 'gerarRelatorio'])->name('produtos.relatorio');

//Código questão 4:
Route::get('/produtos/{produto}/alterar-status', [ProdutoController::class, 'alterarStatus'])->name('produtos.alterarStatus');

Route::resource('clientes', ClienteController::class);

Route::resource('pedidos', PedidoController::class);