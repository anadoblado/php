<a href="{{action([\App\Http\Controllers\FrutaController::class,'naranjas'])}}">Ir a naranjas</a><br>
<a href="{{url('peras')}}">Ir a peras</a>
<ul>
    @foreach($frutas as $fruta)
        <li>{{$fruta}}</li>
    @endforeach
</ul>
