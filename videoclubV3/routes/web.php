<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;


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

/*
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('auth/login', function () {
    return view('auth.login');
});
Route::get('logout', function () {
    return view('logout');
});
Route::get('catalog/index', function () {
    return view('catalog.index');
});
Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show')->with("id",$id);
});
Route::get('catalog/create', function () {
    return view('catalog.create');
});
Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id'=>$id));
});
*/

Route::get('/login');
Route::get("/", [HomeController::class, "getHome"])->name("home");
Route::middleware("auth")->group(function (){
    Route::get("catalog", [CatalogController::class, "getIndex"])->name("index");
    Route::get("catalog/create", [CatalogController::class, "getCreate"])->name("create");
    Route::get("catalog/edit/{id}", [CatalogController::class, "getEdit"])->name("edit");
    Route::get("catalog/show/{id}", [CatalogController::class, "getShow"])->name("show");

});

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
