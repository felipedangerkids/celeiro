<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapturaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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



Route::get('/', function () {
    return view('front.index');
});

Route::post('user-store', [CapturaController::class, 'store']);
Route::get('obrigado', [CapturaController::class, 'thanks'])->name('thanks');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index']
)->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/clientes', [DashboardController::class, 'clientes']);
Route::middleware(['auth:sanctum', 'verified'])->get('/produtos', [ProductController::class, 'index'])->name('products');
Route::middleware(['auth:sanctum', 'verified'])->get('/produtos-edit/{id}', [ProductController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/produtos-store', [ProductController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->any('/produtosDelete/{id}', [ProductController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->any('/produtos-update/{id}', [ProductController::class, 'update']);

//layouts e rotas provisorias

Route::get('/', function () {
    return view('front.idade.idade');
});
Route::get('/inicio', function () {
    return view('front.home.inicio');
});

//produtos//

Route::get('/cervejas', function () {
    return view('front.produtos.cervejas.cervejas');
});
Route::get('/kits', function () {
    return view('front.produtos.kits.kits');
});
Route::get('/embutidos', function () {
    return view('front.produtos.embutidos.embutidos');
});
Route::get('/produto-single', function () {
    return view('front.produto-single.produto-single');
});

//carrinho//

Route::get('/adc-carrinho', function () {
    return view('front.carrinho.adc-carrinho');
});
Route::get('/finalizar-compra', function () {
    return view('front.carrinho.finalizar-compra');
});
Route::get('/efetuar-pagamento', function () {
    return view('front.carrinho.efetuar-pagamento');
});
Route::get('/pedido-concluido', function () {
    return view('front.carrinho.pedido-concluido');
});

//Suas Preferencia//

Route::get('/perfil', function () {
    return view('front.suas-preferencia.perfil');
});
Route::get('/atualizar-perfil', function () {
    return view('front.suas-preferencia.atualizar-perfil');
});
Route::get('/atualizar-endereco', function () {
    return view('front.suas-preferencia.atualizar-endereco');
});
Route::get('/atualizado', function () {
    return view('front.suas-preferencia.atualizado');
});

