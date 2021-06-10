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

Route::get('/idade', function () {
    return view('front.idade.idade');
});
Route::get('/inicio', function () {
    return view('front.home.inicio');
});