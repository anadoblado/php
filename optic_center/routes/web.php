<?php

use App\Http\Controllers\DesvioController;
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

Route::get('/listadoProductos', [DesvioController::class, 'index'])->name('/listadoProductos');
Route::get('/', function () {
    return view('auth.login'); // para entrar al login directamente
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/roluser', [ProbarRoleController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function (){
    Route::resource('user', UserController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('ficha', FichaController::class);
    Route::get('/listaUsuario', [FichaController::class, 'listaUsuario'])->name('ficha.listaUsuario');
});

//Route::resource('/producto', ProductoController::class)->middleware(['auth']);
//Route::get('/producto', [ProductoController::class, 'index'])->middleware(['auth']);
//Route::get('/producto/listado', [ProductoController::class, 'index'])->middleware(['auth']);;

require __DIR__.'/auth.php';
