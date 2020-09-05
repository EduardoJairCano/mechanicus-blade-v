@extends('home')

@section('title', 'Agregar Vehículo')

@section('card-title', 'Agregar Vehículo')

@section('content')

    {{-- Create vehicle form --}}
    <form method="POST" action="{{ route('vehicle.store', $customer) }}">
        @include('vehicles.partials._form',
            [
                'customer'      => $customer,
                'customers'     => $customers,
                'routeToReturn' => 'vehicle.index',
            ]
        )
    </form>

@endsection
