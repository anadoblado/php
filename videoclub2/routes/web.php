<?php

use App\Http\Controllers\FrutaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

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

Route::get('/', [HomeController::class, 'getHome'])->name('home');


Route::get('login', function(){
    return view('auth.login');
    //return 'Vista login';
});

Route::get('logout', function(){
    //return view('logout');
    return 'Vista logout usuario';
});

Route::get('catalog', [CatalogController::class, 'getIndex'])->name('List');

Route::get('catalog/show/{id?}', [CatalogController::class, 'getShow'])->name('Show');

Route::get('catalog/create', [CatalogController::class, 'getCreate'])->name('Create');

Route::get('catalog/edite/{id?}', [CatalogController::class, 'getEdit'])->name('Edit');

