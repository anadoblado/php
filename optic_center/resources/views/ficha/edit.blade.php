<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir nuevo prodúcto al catálogo') }}
        </h2>
    </x-slot>

    @section('content')
        <form action={{url('ficha/'.$ficha->id)}} method="post" enctype="multipart/form-data">
            @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
            @method ('PUT')
            <div class="form-group">
                <label for="fecha">Fecha</label>
                @error('fecha')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{$ficha->fecha}}">
            </div>
            <div class="form-group">
                <label for="user_id">Usuario</label>
                @error('user_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <select id="usuario" name="user_id">
                    @foreach($usuarios as $usuario)
                        <option value="{{$usuario->id}}" {{ $ficha->user_id == $usuario->id ? "selected" : " "}}>{{$usuario->name}}  {{$usuario->apells}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="producto_id">Producto</label>
                @error('producto_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <select id="producto" name="producto_id">
                    @foreach($productos as $producto)
                        <option value="{{$producto->id}}" {{ $ficha->producto_id == $producto->id ? "selected" : " " }}>{{$producto->Ref}}  {{$producto->color}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="g_ojo_iz">Graduación ojo izquierdo</label>
                @error('g_ojo_iz')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="g_ojo_iz" name="g_ojo_iz" value="{{$ficha->g_ojo_iz}}">
            </div>
            <div class="form-group">
                <label for="g_ojo_der">Graduación ojo derecho</label>
                @error('g_ojo_der')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="g_ojo_der" name="g_ojo_der" value="{{$ficha->g_ojo_der}}">
            </div>


            <button type="submit" class="btn btn-warning">Modificar</button>
        </form>

    @endsection
</x-app-layout>