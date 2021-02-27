<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        //return redirect()->action([CatalogController::class,'getIndex']);

        return redirect()->action([AuthenticatedSessionController::class,'create']);
    }
}
