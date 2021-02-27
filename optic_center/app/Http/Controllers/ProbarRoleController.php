<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProbarRoleController extends Controller
{
    public function index(Request $request){
        $request->user()->authorizeRoles(['user']);
        return view('dashboard');
    }
}
