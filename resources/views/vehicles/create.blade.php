@extends('home')

@section('title', 'Agregar Vehículo')

@section('card-title', 'Agregar Vehículo')

@section('content')

    <form method="POST" action="{{--{{ route('vehicle.store') }}--}}">

        {{-- Create/Edit vehicle form --}}
        @include('vehicles.partials._form',
            [
                'customers' => $customers,
                'routeToReturn' => 'vehicle.index',
                'btnText' => 'Guardar'
            ]
        )

    </form>

@endsection
