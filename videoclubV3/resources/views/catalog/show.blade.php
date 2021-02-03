@extends('layout.master')
@section('content')

    <div class="row">
        <div class="col-sm-4">
            <img style="width: 200px" src="{{$peliculas['poster']}}">
        </div>
        <div class="col-sm-8">
            <h3>{{$peliculas['title']}}</h3>
            <h4>Año: {{$peliculas['year']}}</h4>
            <p>Director: {{$peliculas['director']}}</p>
            <p><strong>Resumen: </strong>{{$peliculas['synopsis']}}</p>
            <p>
                @if($peliculas['rented']== false)
                <p><strong>Estado: </strong> Película disponible</p>
                    <button class="btn btn-primary">Alquilar película</button>
                @else
                <p><strong>Estado: </strong> Película actualmente alquilada</p>
                <button class="btn btn-danger">Devolver película</button>
                @endif
            <a href="{{url("/")}}"> <button class="btn btn-default">Volver al listado</button></a>
            {{-- <a href="{{url("/catalog/edit".$peliculas['id'])}}"> <button class="btn btn-warning">Editar</button></a> --}}
            </p>

        </div>
    </div>


@endsection

