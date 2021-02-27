<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade coche máquina') }}
        </h2>
    </x-slot>

    @section('content')
        <form action={{url('car/'.$mycar->id)}} method="post" enctype="multipart/form-data">
            @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
            @method ('PUT')
            <div class="form-group">
                <label for="matricula">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{$mycar->matricula}}">
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{$mycar->marca}}">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{$mycar->modelo}}">
            </div>
            <div class="form-group">
                <label for="year">Año de matriculación</label>
                <input type="text" class="form-control" id="year" name="year" value="{{$mycar->year}}">
            </div>
            <div class="form-group">
                <label for="color">Color del vehículo</label>
                <input type="text" class="form-control" id="color" name="color" value="{{$mycar->color}}">
            </div>
            <div class="form-group">
                <label for="fecha_ultima_revision">Fecha de la última revisión</label>
                <input type="date" class="form-control" id="fecha_ultima_revision" name="fecha_ultima_revision" value="{{$mycar->fecha_ultima_revision}}">
            </div>
            <div class="form-group">
                <label for="foto">Foto del coche</label>
                <img class="rounded float-left" width="10%" src="{{asset(url($url.$mycar->foto))}}">
                <input type="file" class="form-control" id="foto" name="foto" value="{{$mycar->foto}}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{$mycar->precio}}" >
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>

    @endsection
</x-app-layout>
