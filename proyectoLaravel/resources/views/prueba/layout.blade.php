@extends('prueba.master')
@section('title', 'DWES')

@section('header')
    @parent
    <h1>Cabecera de la vista layout</h1>
@endsection

@section('content')
    <p>Contenido de la vista layout</p>
@endsection

@section('footer')
    @parent
    <p>Footer del layout</p>
@endsection