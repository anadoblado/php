<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MayorEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $mayor)
    {
        if ($request->route('edad')<$mayor){
            return redirect()->route('frutas');
        }else{
            return $next($request);
        }

    }
}
