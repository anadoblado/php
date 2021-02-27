<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyCars') }}
        </h2>
    </x-slot>

 @section('content')
     <table class="table">
         <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
         </thead>
         <tbody>
         @foreach($mycars as $mycar)
             <tr>
                 <th scope="row">{{$mycar->id}}</th>
                 <td scope="row">{{$mycar->matricula}}</td>
                 <td scope="row">{{$mycar->marca}}</td>
                 <td scope="row">{{$mycar->modelo}}</td>

                 <td><a href="{{url('car/'.$mycar->id)}}" class="btn btn-primary">Detalles</a></td>
                 <td><a href="{{url('car/'.$mycar->id.'/edit')}}" class="btn btn-warning">Editar</a></td>
                 <td><form action="{{url('car/'.$mycar->id)}}"  method="post">
                         @csrf
                         @method('DELETE')
                         <button class="btn btn-danger" name="borrar">Borrar</button>
                     </form>
             </tr>
             @endforeach
         </tbody>
     </table>


     @endsection
</x-app-layout>
