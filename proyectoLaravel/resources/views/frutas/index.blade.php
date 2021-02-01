<a href="{{action([\App\Http\Controllers\FrutaController::class,'naranjas'])}}">Ir a naranjas</a><br>
<a href="{{url('peras')}}">Ir a peras</a>
<ul>
    @foreach($frutas as $fruta)
        <li>{{$fruta}}</li>
    @endforeach
</ul>

@if (session('error'))
        {{session('error')}}
@endif

<form action="" method="post">
        @csrf
        <p>
                Nombre de la fruta: <input type="text" name="nombre" value="{{old('nombre')}}">
        </p>
        @error('nombre')
        <!--<div style="color:darkred">malooooo</div>-->
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <p>
                Descripción: <textarea name="descripcion"></textarea>
        </p>
        <input type="submit" name="enviar" value="Enviar">
</form>
