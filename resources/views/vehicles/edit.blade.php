@extends('home')

@section('title', 'Editar Vehículo')

@section('card-title', 'Editar Vehículo')

@section('content')

    {{-- Edit vehicle form --}}
    <form method="POST" action="{{ route('vehicle.update', $vehicle) }}">
        @method('PATCH')
        @include('vehicles.partials._form',
            [
                'routeToReturn' => 'vehicle.index',
                'btnText'       => 'Actualizar'
            ]
        )
    </form>

@endsection
