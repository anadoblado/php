<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getShow($id){
        return view('catalog.show', array('id'=>$id));
    }

    public function getEdit($id){
        return view('catalog.edite', array('id'=>$id));
    }

    public function getIndex(){
        return view('catalog.index');
    }

    public function getCreate(){
        return view('catalog.create');
    }
}
