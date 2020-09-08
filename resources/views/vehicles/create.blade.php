@extends('home')

@section('title', 'Agregar Vehículo')

@section('card-title', 'Agregar Vehículo')

@section('content')

    {{-- Create Vehicle form --}}
    <form method="POST" action="{{ route('vehicle.store', $customer) }}">
        {{-- Select or Create Customer section --}}
        @if (isset($customers))
            <div class="pb-4">
                @include('customers.partials.select_or_create_customer',
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
