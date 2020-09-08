@extends('home')

@section('title', 'Agregar Compañia')

@section('card-title', 'Agregar Compañia')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <h3 class="col-md-8 col-sm-8">
            <span class="font-weight-bold">
                Información de la Compañia
            </span>
        </h3>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'             => 'customer.show',
                    'obj'               => $customer,
                    'title'             => 'Regresar a Información de Cliente',
                    'message'           => 'Regresar'
                ]
            )
        </div>
    </div>

    <hr>

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