@extends('home')

@section('title', 'Agregar Vehículo')

@section('card-title', 'Agregar Vehículo')

@section('content')

    {{-- Create vehicle form --}}
    <form method="POST" action="{{ route('vehicle.store', $customer) }}">
        {{-- Select or Create Customer section --}}
        @if (isset($customers))
            <div>
                @include('vehicles.partials.select_or_create_customer',
                    [
                        'customer_id'   => isset($customer) ? $customer->id : null,
                        'customers'     => $customers,
                        'routeToReturn' => isset($customer) ? 'customer.show' : 'vehicle.index',
                    ]
                )
            </div>
        @endif

        {{-- Vehicle info form --}}
        @include('vehicles.partials._form')
    </form>

@endsection
