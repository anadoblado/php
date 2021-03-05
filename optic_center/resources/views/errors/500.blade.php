@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Página no encontrada'))

@section('image')
    <style>
        #apartado-derecho{
            text-align:center;
        }
        ul{
            text-decoration: none !important;
            list-style: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <div id="apartado-derecho" style="background-color: #dcf7f7;" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
        <h2>Vuelve al inicio y prueba de nuevo</h2>
        <ul>
            <li><a href="producto">Inicio</a></li>


        </ul>
    </div>
@endsection

@section('message', __('Error interno del servidor.'))
