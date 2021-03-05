<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir nuevo prodúcto al catálogo') }}
        </h2>
    </x-slot>

    @section('content')
        <form action={{route('producto.store')}} method="post" enctype="multipart/form-data">
            @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
            <div class="form-group">
                <label for="Ref">Referencia</label>
                @error('Ref')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="Ref" name="Ref" placeholder="Referencia">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                @error('color')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="color" name="color" placeholder="Color">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                @error('precio')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="year">Año de matriculación</label>--}}
{{--                <input type="text" class="form-control" id="year" name="year" placeholder="Año de matriculación">--}}
{{--            </div>--}}


            <div class="form-group">
                <label for="imagen">Imagen del producto</label>
                @error('imagen')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>

            <button type="submit" class="btn btn-warning">Guardar</button>
        </form>

    @endsection
</x-app-layout>