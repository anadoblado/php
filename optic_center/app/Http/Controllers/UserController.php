<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = User::FindOrFail(Auth::id());
//
//        $citas = $user->citas()->get();
//
//        return view ('cita.index')->with('citas', $citas);
        $usuarios = User::all();
        return view('user.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validated = $request->validate([
//            'name' => 'required',
//            'apells' => 'required',
//            'dni' => 'required',
//            'email' => 'required',
//
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        //$url = 'storage/img/';
        //->with('url', $url)
        return view('user.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with('user', $user);
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
            'name' => 'required',
            'apells' => 'required',
            'dni' => 'required',
            'email' => 'required',

        ]);

        $newUser = User::findOrFail($id);
        $newUser->name=$request->name;
        $newUser->apells=$request->apells;
        $newUser->dni=$request->dni;
        $newUser->email=$request->email;
        $newUser->address=$request->address;
        $newUser->cp=$request->cp;
        $newUser->city=$request->city;
        $newUser->save();


        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
