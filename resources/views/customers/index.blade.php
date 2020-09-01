@extends('home')

@section('title', 'Clientes')

@section('card-title', 'Clientes')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center pb-4">
        <div class="col-md-8 col-sm-8">
            <div class="row col-12">
                <h4 class="font-weight-bold text-primary">
                    Clientes
                </h4>
            </div>
            <div class="row col-12">
                <span>
                    Nombre del negocio
                </span>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'             => 'customer.create',
                    'classForButton'    => 'btn btn-primary',
                    'title'             => 'Agregar nuevo Cliente',
                    'message'           => 'Agregar'
                ]
            )
        </div>
    </div>

    {{-- Customers list section --}}
    @if (count($customers) > 0)
        <div class="row align-items-center p-2">
            @include('customers.partials.list', $customers)
        </div>
    @else
        <hr>
        <div class="row d-flex justify-content-center pb-2">
            <span class="text-center text-black-50">
                No hay clientes registrados aún
            </span>
        </div>
    @endif

    {{-- Return button --}}
    <div class="row pb-2">
        <div class="col-md-1 offset-10 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'     => 'home',
                    'title'     => 'Regresar a Página Principal',
                    'message'   => 'Regresar'
                ]
            )
        </div>
    </div>

@endsection
