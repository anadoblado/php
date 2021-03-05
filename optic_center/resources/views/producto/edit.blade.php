<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar datos del usuario') }}
        </h2>
    </x-slot>

    @section('content')
        <form action={{url('producto/'.$producto->id)}} method="post" enctype="multipart/form-data">
            @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
            @method ('PUT')
            <div class="form-group">
                <label for="Ref">Referencia</label>
                @error('Ref')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="Ref" name="Ref" value="{{$producto->Ref}}">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                @error('color')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="color" name="color" value="{{$producto->color}}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                @error('precio')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="precio" name="precio" value="{{$producto->precio}}">
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="year">Año de matriculación</label>--}}
            {{--                <input type="text" class="form-control" id="year" name="year" placeholder="Año de matriculación">--}}
            {{--            </div>--}}


            <div class="form-group">
                <label for="imagen">Imagen del producto</label>
                <img class="rounded float-left" width="10%" src="{{asset(url($url.$producto->imagen))}}">
                @error('imagen')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="file" class="form-control" id="imagen" name="imagen" value="{{$producto->imagen}}">
            </div>

            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>

    @endsection
</x-app-layout>