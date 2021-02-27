<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::FindOrFail(Auth::id());

        //si quiero recurperar algunos "where('color','blanco')
        $mycars = $user->cars()->get();

        // el with es para pasarle el objeto a la vista
        return view('car.index')->with('mycars', $mycars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricula'=>'required',
            'marca' => 'required',
            'modelo' => 'required',
            'foto' => 'required|image'
        ]);

        $newCar = new Car();
        $newCar->matricula=$request->matricula;
        $newCar->marca=$request->marca;
        $newCar->modelo=$request->modelo;
        $newCar->year=$request->year;
        $newCar->color=$request->color;
        $newCar->fecha_ultima_revision=$request->fecha_ultima_revision;
        $newCar->precio=$request->precio;
        $newCar->user_id=Auth::id();

        $nombrefoto = time().'_'.$request->file('foto')->getClientOriginalName();
        $newCar->foto=$nombrefoto;

        $newCar->save();

        $request->file('foto')->storeAs('public/img',$nombrefoto);
        // esto iba antes, pero ya no    return view('car.index');
        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mycar = Car::findOrFail($id); // así le mando el coche a la vista
        $url = 'storage/img/';
        return view('car.show')->with('mycar', $mycar)->with('url', $url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mycar = Car::findOrFail($id); // así le mando el coche a la vista
        $url = 'storage/img/';
        return view('car.edit')->with('mycar', $mycar)->with('url', $url);
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
        $validated = $request->validate([
            'matricula'=>'required',
            'marca' => 'required',
            'modelo' => 'required',
            'foto' => 'required|image'
        ]);

        $newCar = Car::findOrFail($id);
        $newCar->matricula=$request->matricula;
        $newCar->marca=$request->marca;
        $newCar->modelo=$request->modelo;
        $newCar->year=$request->year;
        $newCar->color=$request->color;
        $newCar->fecha_ultima_revision=$request->fecha_ultima_revision;
        $newCar->precio=$request->precio;
        $newCar->user_id=Auth::id();

        //como hay foto, hay que comprobar si es la misma o quiere otra
        if(is_uploaded_file($request->foto)){
            $nombrefoto = time().'_'.$request->file('foto')->getClientOriginalName();
            $newCar->foto=$nombrefoto;
            $request->file('foto')->storeAs('public/img',$nombrefoto);
        }

        $newCar->save();

        // esto iba antes, pero ya no    return view('car.index');
        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "borrar";
    }
}
