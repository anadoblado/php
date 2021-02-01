<?php

use App\Http\Controllers\FrutaController;
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

// pasarle ruta de contacto y se ve en una vista
//Route::get('contacto', function () {
//    return view('contacto');
//S});

// pasarle ruta del contacto con un parámetro con el where podemos comprobar que los parámetros cumplen con las especificaciones
//Route::get('contacto/{nombre?}/{edad?}', function ($nombre="Ana",$edad=30) {
//    return 'Vista contacto de '.$nombre.' de '.$edad;
//})->where(['nombre'=>'[A-Za-z]+','edad'=>'[0-9]+']) ->name('contact);


// para ver la lista de rutas en la consola >php artisan route:list

Route::get('contacto/{nombre?}/{edad?}', function ($nombre="Ana",$edad=30) {
    //return view('contacto', ['nombre'=>$nombre, 'edad'=>$edad]);
   //Otra manera de pasarle parámetros
    // return view('contacto')->with('nombre',$nombre)
   //                             ->with('edad',$edad);
    //return view('prueba.contacto', compact('nombre','edad'));
    return view('prueba.contacto')->with('nombre', $nombre)
        ->with('edad', $edad)
        ->with('frutas', array('manzana', 'pera', 'melon', 'sandia'));
})->where(['nombre'=>'[A-Za-z]+','edad'=>'[0-9]+'])
    ->middleware('es_mayor_edad:15');

// añadir un middleware a una ruta

Route::get('layout', function (){
    return view('prueba.layout');
});

Route::prefix('fruterias')->group(function (){
    Route::get('frutas',	[FrutaController::class,'index'])->name('frutas');
    Route::post('frutas', [FrutaController::class, 'recibirFormulario'])->name('recibir');
    Route::get('naranjas',	[FrutaController::class,'naranjas'])->name('naranjas');
    Route::get('peras',	[FrutaController::class,'peras'])->name('peras');
});
