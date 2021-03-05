<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\UseUse;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('ficha.index')->with('fichas', Ficha::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $usuarios = User::all();
        return view ('ficha.create')->with('productos', $productos)->with('usuarios', $usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'fecha.required' => 'Debes introducir una fecha',
            'g_ojo_iz.required' => 'Campo obligatorio',
            'g_ojo_der.required' => 'Campo obligatorio',
            'user_id.required'=> 'Campo obligatorio',
            'producto_id.required'=> 'Campo obligatorio',
        ];

        $request->validate([
            'fecha' => 'required',
            'g_ojo_iz' => 'required',
            'g_ojo_der' => 'required',
            'user_id' => 'required',
            'producto_id' => 'required',
        ], $messages);

        $newFicha = new Ficha();
        $newFicha->fecha=$request->fecha;
        $newFicha->g_ojo_iz=$request->g_ojo_iz;
        $newFicha->g_ojo_der=$request->g_ojo_der;
        $newFicha->user_id=$request->user_id;
        $newFicha->producto_id=$request->producto_id;

        $newFicha->save();
        return redirect()->route('ficha.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = Ficha::findOrFail($id);
        $producto = Producto::findOrFail($ficha->producto_id);
        $url = 'storage/img/';
        $usuario = User::findOrFail($ficha->user_id);
        return view('ficha.show')->with('ficha', $ficha)->with('producto', $producto)->with('url', $url)->with('usuario', $usuario);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ficha = Ficha::findOrFail($id);
        $productos = Producto::all();
        $usuarios = User::all();
        return view('ficha.edit')->with('ficha', $ficha)->with('productos', $productos)->with('usuarios', $usuarios);




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'fecha.required' => 'Debes introducir una fecha',
            'g_ojo_iz.required' => 'Campo obligatorio',
            'g_ojo_der.required' => 'Campo obligatorio',
            'user_id.required'=> 'Campo obligatorio',
            'producto_id.required'=> 'Campo obligatorio',
        ];

        $request->validate([
            'fecha' => 'required',
            'g_ojo_iz' => 'required',
            'g_ojo_der' => 'required',
            'user_id' => 'required',
            'producto_id' => 'required',
        ], $messages);

        $newFicha = Ficha::findOrFail($id);
        $newFicha->fecha=$request->fecha;
        $newFicha->g_ojo_iz=$request->g_ojo_iz;
        $newFicha->g_ojo_der=$request->g_ojo_der;
        $newFicha->user_id=$request->user_id;
        $newFicha->producto_id=$request->producto_id;

        $newFicha->save();
        return redirect()->route('ficha.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ficha = Ficha::find($id);
        $ficha->delete();
        return redirect()->route('ficha.index');
    }

    public function listaUsuario(){
        //$user = User::FindOrFail(Auth::user());
        //$fichas = $user->visitas()->get();
        return view ('ficha.listaUsuario')->with('fichas', Auth::user()->visitas);
    }
}
