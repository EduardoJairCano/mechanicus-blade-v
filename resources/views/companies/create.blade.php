@extends('home')

@section('title', 'Agregar Compañia')

@section('card-title', 'Agregar Compañia')

@section('content')

    {{-- Create company form --}}
    <form method="POST" action="{{ route('company.store', $customer) }}">
        {{-- Select or Create Customer section --}}
        {{--@if (isset($customers))
            <div>
                @include('vehicles.partials.select_or_create_customer',
                    [
                        'customer_id'   => isset($customer) ? $customer->id : null,
                        'customers'     => $customers,
                        'routeToReturn' => isset($customer) ? 'customer.show' : 'vehicle.index',
                    ]
                )
            </div>
        @endif--}}

        {{-- Company info form --}}
        @include('companies.partials._form')
    </form>

@endsection
