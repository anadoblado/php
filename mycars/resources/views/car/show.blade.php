<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del coche') }}
        </h2>
    </x-slot>

    @section('content')
        <h1>{{$mycar->marca}}-{{$mycar->modelo}}</h1>
        <div class="row">
            <div class="col-sm-4">
                <img class="rounded float-left" width="50%" src="{{asset($url. $mycar->foto)}}">
            </div>
            <p>{{$mycar->marca}}</p>
        </div>

    @endsection
</x-app-layout>
