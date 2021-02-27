<?php

use App\Http\Controllers\FichaController;
use App\Http\Controllers\ProbarRoleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/roluser', [ProbarRoleController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(/**
 *
 */ function (){
    Route::resource('user', UserController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('ficha', FichaController::class);
});

require __DIR__.'/auth.php';
