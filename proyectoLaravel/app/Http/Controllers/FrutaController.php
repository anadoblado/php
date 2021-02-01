<?php

namespace App\Http\Controllers;

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

    public function recibirFormulario(Request $request){
        $request->validate([
            'nombre'=>'required|max:15',
            'descripcion'=>'required',
        ]);
        //if ($request->input('nombre') != 'pera'){
        //    return redirect()->route('frutas')->withInput()->with('error', "Se ha producido un error");
        //}else{
        //    return redirect()->route('peras');
        //}
    }
}
