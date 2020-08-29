@extends('home')

@section('title', 'Editar Vehículo')

@section('card-title', 'Editar Vehículo')

@section('content')

    <form method="POST" action="{{ route('vehicle.update', $vehicle) }}">

        @method('PATCH')

        {{-- Create/Edit vehicle form --}}
        @include('vehicles.partials._form',
            [
                'routeToReturn' => 'vehicle.index',
                'btnText' => 'Actualizar'
            ]
        )

    </form>

@endsection
