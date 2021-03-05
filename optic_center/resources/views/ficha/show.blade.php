
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir nuevo prodúcto al catálogo') }}
        </h2>
    </x-slot>

    @section('content')
        {{-- <form action={{route('ficha.store')}} method="post" enctype="multipart/form-data"> --}}

            @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
    <div>
        <div class="form-group" style="align-content: center">

            <img class="rounded float-left" width="20%" src="{{asset($url. $producto->imagen)}}">

        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{$ficha->fecha}}">
        </div>
        <div class="form-group">
            <label for="user_id">Usuario</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{$usuario->name}} {{$usuario->apells}}">
        </div>
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <input type="text" class="form-control" id="producto_id" name="producto_id" value="{{$producto->Ref}}">
        </div>
        <div class="form-group">
            <label for="g_ojo_iz">Graduación ojo izquierdo</label>
            <input type="text" class="form-control" id="g_ojo_iz" name="g_ojo_iz" value="{{$ficha->g_ojo_iz}}">
        </div>
        <div class="form-group">
            <label for="g_ojo_der">Graduación ojo derecho</label>
            <input type="text" class="form-control" id="g_ojo_der" name="g_ojo_der" value="{{$ficha->g_ojo_der}}">
        </div>


        <div>
            <a href="{{route('ficha.index')}}" class="btn btn-primary">Volver</a>
        </div>

    </div>


        {{-- </form> --}}
    @endsection
</x-app-layout>
