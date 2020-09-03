@extends('home')

@section('title', 'Agregar Vehículo')

@section('card-title', 'Agregar Vehículo')

@section('content')

    {{-- Create vehicle form --}}
    <form method="POST" action="{{ route('vehicle.store') }}">
        @include('vehicles.partials._form',
            [
                'customer'      => $customer,
                'customers'     => $customers,
                'routeToReturn' => 'vehicle.index',
                'btnText'       => 'Guardar'
            ]
        )
    </form>

@endsection
