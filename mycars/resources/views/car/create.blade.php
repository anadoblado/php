<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade coche máquina') }}
        </h2>
    </x-slot>

    @section('content')
       <form action={{route('car.store')}} method="post" enctype="multipart/form-data">
           @csrf {{-- para verificar los datos con el token y que no se pueda acceder a ellos --}}
           <div class="form-group">
               <label for="matricula">Matrícula</label>
               <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula">
           </div>
           <div class="form-group">
               <label for="marca">Marca</label>
               <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
           </div>
           <div class="form-group">
               <label for="modelo">Modelo</label>
               <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
           </div>
           <div class="form-group">
               <label for="year">Año de matriculación</label>
               <input type="text" class="form-control" id="year" name="year" placeholder="Año de matriculación">
           </div>
           <div class="form-group">
               <label for="color">Color del vehículo</label>
               <input type="text" class="form-control" id="color" name="color" placeholder="Color">
           </div>
           <div class="form-group">
               <label for="fecha_ultima_revision">Fecha de la última revisión</label>
               <input type="date" class="form-control" id="fecha_ultima_revision" name="fecha_ultima_revision" placeholder="Fecha">
           </div>
           <div class="form-group">
               <label for="foto">Foto del coche</label>
               <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto del vehículo">
           </div>
           <div class="form-group">
               <label for="precio">Precio</label>
               <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
           </div>
           <button type="submit" class="btn btn-warning">Guardar</button>
       </form>

    @endsection
</x-app-layout>
