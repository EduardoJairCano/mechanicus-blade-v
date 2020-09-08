@extends('home')

@section('title', 'Agregar Compañia')

@section('card-title', 'Agregar Compañia')

@section('content')

    {{-- Create Company form --}}
    <form method="POST" action="{{ route('company.store', $customer) }}">
        {{-- Select or Create Customer section --}}
        @if (isset($customers))
            <div class="pb-4">
                @include('customers.partials.select_or_create_customer',
                    [
                        'routeToReturn' => isset($customer) ? 'customer.show' : 'company.index',
                        'customer_id'   => isset($customer) ? $customer->id : null,
                        'customers'     => $customers,
                    ]
                )
            </div>
        @endif

        {{-- Company info form --}}
        @include('companies.partials._form')
    </form>

@endsection
