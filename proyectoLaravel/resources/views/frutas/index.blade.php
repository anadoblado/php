<a href="{{action([\App\Http\Controllers\FrutaController::class,'naranjas'])}}">Ir a naranjas</a><br>
<a href="{{url('peras')}}">Ir a peras</a>
<ul>
    @foreach($frutas as $fruta)
        <li>{{$fruta}}</li>
    @endforeach
</ul>

<form action="" method="post">
        <p>
                Nombre de la fruta: <input type="text" name="nombre">

        </p>
        <p>
                Descripción: <textarea name="descripcion">Descripción</textarea>
        </p>
        <input type="submit" name="enviar" value="Enviar">
</form>
