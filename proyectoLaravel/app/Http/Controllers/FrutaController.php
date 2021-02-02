<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationFormRequest;
use Illuminate\Http\Request;

class FrutaController extends Controller
{
    public function index(){
        return view('frutas.index')->with('frutas', array('manzana', 'pera', 'melón', 'plátano', 'sandía', 'kiwi'));
    }

    public function peras(){
        return "Web de peras";
    }

    public function naranjas(){
        return "Web de naranjas";
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
