<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'Ref' => ['required', 'string'],
            'color' => ['required', 'string'],
            'precio' => ['required', 'number'],
            'imagen' => ['required'],
        ]);

        Producto::create([
            'Ref' => $request->Ref,
            'color' => $request->color,
            'precio' => $request->precio,
            'imagen' => $request->imagen,
        ]);

        return response()->json(['result','OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Producto::findOrFail($id);
        return response()->json($productos);
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
        $producto = Producto::findOrFail($id);

        Validator::make($request->all(), [
            'Ref' => ['required','string'],
            'color' => ['required'],
            'precio' => ['required','number'],
            'imagen' => ['required'],
        ]);

        $producto->Ref = $request->Ref;
        $producto->color = $request->color;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $producto->save();

        return response()->json(['result','OK']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return response()->json(['result','OK']);
    }
}
