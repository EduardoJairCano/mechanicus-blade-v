@extends('home')

@section('title', 'Clientes')

@section('card-title', 'Clientes')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center pb-4">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h4 class="font-weight-bold text-primary">
                    Clientes
                </h4>
            </div>
            <div class="row col-md-6">
                <span>
                    Nombre del negocio
                </span>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-content-center">
            <a href="{{ route('customer.create') }}" class="btn btn-primary">
                <span class="">
                    Agregar nuevo cliente
                </span>
            </a>
        </div>
    </div>

    {{-- Customers list section --}}
    @if (count($customers) > 0)
        <div class="row align-items-center pb-2">
            <div class="col-md-12">
                @include('customers.partials.list', $customers)
            </div>
        </div>
    @else
        <hr>
        <div class="row-cols-md-12 d-flex justify-content-center">
            <span class="text-center text-black-50">No hay clientes registrados aún</span>
        </div>
    @endif

@endsection
