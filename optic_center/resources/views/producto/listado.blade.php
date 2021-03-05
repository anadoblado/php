
{{--<h1>listado</h1>--}}
{{----}}

<x-app-layout>
    <x-alot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            Lista de productos--}}
            {{__('Optic_Center')}}
        </h2>
    </x-alot>
    @section('content')
        @csrf
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Referencia</th>
                <th scope="col">Color</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <th scope="row">{{$producto->id}}</th>
                    <th scope="row">{{$producto->Ref}}</th>
                    <th scope="row">{{$producto->color}}</th>
                    <th scope="row">{{$producto->precio}}</th>
                    <th><a href="{{url('producto/'.$producto->id)}}" class="btn btn-primary">Detalles</a></th>
                    <td><a href="{{url('producto/'.$producto->id.'/edit')}}" class="btn btn-warning">Editar</a></td>
                    <td><form action="{{url('producto/'.$producto->id)}}"  method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" name="borrar">Borrar</button>
                        </form>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>

    @endsection
</x-app-layout>