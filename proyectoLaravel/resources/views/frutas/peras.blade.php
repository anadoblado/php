<h1>Fruta buscada
    {{--
    para cuando le paso solo un elemento
    {{$frutas->nombre}}
{{$frutas->pais}} --}}


    {{-- Para una lista de elmentos --}}
@foreach($frutas as $f)
    {{$f->nombre}}<br>
    {{$f->pais}}<br>
    ==========<br>
    @endforeach
