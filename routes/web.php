<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapturaController;
use App\Http\Controllers\DashboardController;

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

