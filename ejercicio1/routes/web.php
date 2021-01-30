<?php

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
    return view('home');
})->name('home');

Route::get('login', function(){
    return view('auth.login');
    //return 'Vista login';
});

Route::get('logout', function(){
    //return view('logout');
    return 'Vista logout usuario';
});

Route::get('catalog', function(){
    return view('catalog.index');
    //return 'Listado de películas';
})->name('List');

Route::get('catalog/show/{id?}', function($id="5"){
    return view('catalog.show', array('id'=>$id));
    //return 'Vista detalle película {'.$id.'}';
})->name('Show');

Route::get('catalog/create', function(){
    return view('catalog.create');
    //return 'Añadir película';
})->name('Create');

Route::get('catalog/edite/{id?}', function($id="5"){
    return view('catalog.edite',array('id'=>$id));
    //return 'Modificar película {'.$id.'}';
})->name('Edit');

