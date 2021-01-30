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
}
