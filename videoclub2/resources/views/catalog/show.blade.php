@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$arrayPeliculas[$id]['poster']}}" style="height: 200px">
        </div>
        <div class="col-sm-8">
            @foreach($arrayPeliculas[$id] as $key => $value)
                @if($key != 'poster' && $key != 'rented' )
                    <p><strong>{{$key}}</strong> : {{$value}}</p>
                @endif
            @endforeach

            @if($arrayPeliculas[$id]['rented'] == false)
                <button style="background-color: #1b4b72; color: white">Alquilar película</button>
            @else
                <p>Película alquilada</p>
                <button style="background-color: #b91d19; color: white">Devolver película</button>
            @endif


        </div>
    </div>
@endsection
