
{{--<h1>{{print_r($fichas)}}</h1> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado visitas
        </h2>
    </x-slot>

    @section('content')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Graduación ojo izquierdo</th>
                <th scope="col">Graduación ojo derecho</th>
                <th scope="col">Producto adquirido</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($fichas as $ficha)
                <tr>
                    <th scope="row">{{$ficha->id}}</th>
                    <td scope="row">{{$ficha->fecha}}</td>
                    <td scope="row">{{$ficha->g_ojo_iz}}</td>
                    <td scope="row">{{$ficha->g_ojo_der}}</td>
                    <td scope="row">{{$ficha->visita_articulo->Ref}}</td>

                    {{--                    <td scope="row">{{$ficha->find($ficha->producto_i)->visita_articulo->Ref}}</td>--}}

                    <td><a href="{{url('ficha/'.$ficha->id)}}" class="btn btn-primary">Detalles</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>


    @endsection
</x-app-layout>