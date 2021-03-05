

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado usuarios
        </h2>
    </x-slot>

    @section('content')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>

                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usu)
                <tr>
                    <th scope="row">{{$usu->id}}</th>
                    <td scope="row">{{$usu->name}}</td>
                    <td scope="row">{{$usu->apells}}</td>


                    {{--                    <td scope="row">{{$ficha->find($ficha->producto_i)->visita_articulo->Ref}}</td>--}}

                    <td><a href="{{url('user/'.$usu->id)}}" class="btn btn-primary">Detalles</a></td>
                    <td><a href="{{url('user/'.$usu->id.'/edit')}}" class="btn btn-warning">Editar</a></td>
                    <td><form action="{{url('user/'.$usu->id)}}"  method="post">
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