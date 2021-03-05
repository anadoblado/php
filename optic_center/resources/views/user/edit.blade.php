
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir nuevo prodúcto al catálogo') }}
        </h2>
    </x-slot>
    @section('content')
        <form action={{url('user/'.$user->id)}} method="post" enctype="multipart/form-data">
            @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
            @method ('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="apells">Apellidos</label>
                <input type="text" class="form-control" id="apells" name="apells" value="{{$user->apells}}">
            </div>
            <div class="form-group">
                <label for="dni">Dni</label>
                <input type="text" class="form-control" id="dni" name="dni" value="{{$user->dni}}">
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="year">Año de matriculación</label>--}}
            {{--                <input type="text" class="form-control" id="year" name="year" placeholder="Año de matriculación">--}}
            {{--            </div>--}}
            <div class="form-group">
                <label for="email">Dni</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            {{--
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" class="form-control" id="password" name="password" value="{{$user->password}}">
            </div>
            --}}

            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
            </div>
            <div class="form-group">
                <label for="cp">Código postal</label>
                <input type="text" class="form-control" id="cp" name="cp" value="{{$user->cp}}">
            </div>
            <div class="form-group">
                <label for="city">Localidad</label>
                <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    @endsection
</x-app-layout>