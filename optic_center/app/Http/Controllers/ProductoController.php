<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User:: FindOrFail(Auth::id());

        $productos = Producto::all();
        $url = 'storage/img/';
        return view('producto.index')->with('productos', $productos)->with('url', $url);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'Ref.required' => 'Campo obligatorio',
            'color.required' => 'Campo obligatorio',
            'precio.required' => 'Campo obligatorio',
            'imagen.required' => 'Campo obligatorio',
            'Ref.'.Rule::unique('productos') => 'Referencia registrada',
        ];
        $request->validate([
            'Ref' => 'required|'.Rule::unique('productos'),
            'color' => 'required',
            'precio' => 'required',
            'imagen' => 'required',

        ], $messages);

        $newProducto = new Producto();
        $newProducto->Ref = $request->Ref;
        $newProducto->color = $request->color;
        $newProducto->precio = $request->precio;

        $nombreImagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
        $newProducto->imagen = $nombreImagen;

        $newProducto->save();

        $request->file('imagen')->storeAs('public/img', $nombreImagen);
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $url = 'storage/img/';
        return view('producto.edit')->with('producto', $producto)->with('url', $url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'Ref.required' => 'Campo obligatorio',
            'color.required' => 'Campo obligatorio',
            'precio.required' => 'Campo obligatorio',
            'Ref.'.Rule::unique('productos') => 'Referencia registrada',

        ];
        $request->validate([
            'color' => 'required',
            'precio' => 'required',


        ], $messages);

        $newProducto = Producto::findOrFail($id);
        $newProducto->Ref = $request->Ref;
        $newProducto->color = $request->color;
        $newProducto->precio = $request->precio;

        if (is_uploaded_file($request->imagen)) {
            $nombreImagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $newProducto->imagen = $nombreImagen;
            $request->file('imagen')->storeAs('public/img', $nombreImagen);
        }
        $newProducto->save();

        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
