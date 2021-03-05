<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesvioController extends Controller
{
    public function inde(){
        return redirect('/listaProductos');
    }
}
