<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            Lista de productos--}}
            {{__('Optic_Center')}}
        </h2>
    </x-slot>
    @section('content')

        <div class="row">
            @foreach($productos as $producto)

                <div class="col-sm-4" >
                    <div class="card" style="width:300px">
                        <img class="card-img-top" src="{{asset($url. $producto->imagen)}}" alt="Card image" style="width:100%; height: 200px">
                        <div class="card-body">
                            <h4 class="card-title">Producto de id: {{$producto->id}} </h4>
                            <p class="card-text">Referencia: {{$producto->Ref}}</p>
                            <p class="card-text">Color: {{$producto->color}} </p>
                            <p class="card-text">Precio: {{$producto->precio}}€</p>
                            @if(Auth::check() && Auth::user()->roles->contains(1))

{{--                            <a href="{{url('producto/'.$producto->id)}}" class="btn btn-primary">Detalles</a>--}}
                            <a href="{{url('producto/'.$producto->id.'/edit')}}" class="btn btn-outline-warning btn-block mb-2" style="margin-bottom: 10px">Editar</a>
                            <form action="{{url('producto/'.$producto->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-block" name="borrar">Borrar</button>
                            </form>
                                @endif
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        {{--    --}}
        {{--        <table class="table">--}}
        {{--            <thead>--}}
        {{--            <tr>--}}
        {{--                <th scope="col">#</th>--}}
        {{--                <th scope="col">Referencia</th>--}}
        {{--                <th scope="col">Color</th>--}}
        {{--                <th scope="col">Precio</th>--}}
        {{--                <th scope="col"></th>--}}
        {{--                <th scope="col"></th>--}}
        {{--                <th scope="col"></th>--}}
        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody>--}}
        {{--            @foreach($productos as $producto)--}}
        {{--                <tr>--}}
        {{--                    <th scope="row">{{$producto->id}}</th>--}}
        {{--                    <th scope="row">{{$producto->Ref}}</th>--}}
        {{--                    <th scope="row">{{$producto->color}}</th>--}}
        {{--                    <th scope="row">{{$producto->precio}}</th>--}}
        {{--                    <th><a href="{{url('producto/'.$producto->id)}}" class="btn btn-primary">Detalles</a></th>--}}
        {{--                    <td><a href="{{url('producto/'.$producto->id.'/edit')}}" class="btn btn-warning">Editar</a></td>--}}
        {{--                    <td><form action="{{url('producto/'.$producto->id)}}"  method="post">--}}
        {{--                            @csrf--}}
        {{--                            @method('DELETE')--}}
        {{--                            <button class="btn btn-danger" name="borrar">Borrar</button>--}}
        {{--                        </form>--}}
        {{--                </tr>--}}
        {{--                @endforeach--}}
        {{--                </tr>--}}
        {{--            </tbody>--}}
        {{--        </table>--}}

    @endsection
</x-app-layout>