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
        <!--
        {{--@error('nombre')
        <!--<div style="color:darkred">malooooo</div>-->
        <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}

         -->



        @error('nombre')
        <!--<div style="color:darkred">malooooo</div>-->
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <p>
                Descripción: <textarea name="descripcion"></textarea>
        </p>
        <input type="submit" name="enviar" value="Enviar">
</form>
        <ul>
                {{-- Todos los errores de todos los controles a la vez --}}
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
        </ul>

<ul>
        {{-- Todos los errores de ese control en concreto
          @foreach($errors->get('nombre') as $error)
                <li>{{$error}}</li>
        @endforeach--}}

</ul>

<ul>
        {{-- El primero de los errores de ese control en concreto
        {{$errors->first('nombre')}}
        --}}


</ul>
{{-- Devuelve verdadero o falso, es decir si se ha producido un error se devuelve verdadero (valores 0 o 1)
@if($errors->has('nombre'))
        {{$errors->first('nombre')}}
        @endif
--}}
