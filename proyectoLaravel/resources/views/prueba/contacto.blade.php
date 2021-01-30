<?php ?>
@include('prueba.cabecera', ['nom'=>$nombre, 'edad'=>$edad])
<h2>wey pinche,{{$nombre}} de pechá años {{$edad}}</h2>
{{-- $nombre or 'Anita' --}}
@if($edad <18)
    Eres menor de edad wevon
@else
    Eres mayor de edad
@endif

<h1>Lista</h1>
@foreach($frutas as $fruta)
    {{$fruta}}<br>
@endforeach
@include('prueba.cabecera')
