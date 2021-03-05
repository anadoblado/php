<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datos del usuario/a') }}
        </h2>
    </x-slot>
    @section('content')

        <div class="card" style="width:600px">
{{--            {{asset($url. $mycar->foto)}}--}}
            <div class="card-body">
                <h4 class="card-title">{{$user->name}} {{$user->apells}}</h4>
                <p class="card-text">Dni: {{$user->dni}}</p>
                <p class="card-text">Dirección: {{$user->address}}</p>
                <p class="card-text">Cp: {{$user->cp}}</p>
                <p class="card-text">Localidad: {{$user->city}}</p>
                <p class="card-text">Email: {{$user->email}}</p>

                <a href="{{route('user.index')}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    @endsection
</x-app-layout>
