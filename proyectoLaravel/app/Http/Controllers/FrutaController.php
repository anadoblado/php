<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationFormRequest;
use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller
{
    public function index(){
        return view('frutas.index')->with('frutas', array('manzana', 'pera', 'melón', 'plátano', 'sandía', 'kiwi'));
    }

    public function peras(){
        //$f = Fruit::find(7);
        //dd($f);
        //$f = Fruit::findOrFail(7);

        //$f = Fruit::all();

        //$f = Fruit::first();
        $f = Fruit::where("temporada", 2)->get();
        return view('frutas.peras')->with('frutas', $f);
    }

    public function naranjas(){
        $frutas = DB::table('frutas')->get();
        foreach ($frutas as $f){
            var_dump($f);
           // echo $f-nombre;
        }
        return view('frutas.naranjas')->with('frutas',$frutas);
    }

    public function recibirFormulario(ValidationFormRequest $request){
        // para personalizar los mensajes
       /* $messages = ['nombre.requires'=>'Error, el campo es obligatorio',
           'nombre.min:15'=>'Mínimo 15',
           'descripcion.required'=>'Descripción obligatoria'];
        $request->validate([
            'nombre'=>'min:15|required',
            'descripcion'=>'required',
        ], $messages);
       */
       $request->validated();
        //if ($request->input('nombre') != 'pera'){
        //    return redirect()->route('frutas')->withInput()->with('error', "Se ha producido un error");
        //}else{
        //    return redirect()->route('peras');
        //}
    }
}
