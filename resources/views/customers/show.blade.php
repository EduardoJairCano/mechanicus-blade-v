@extends('home')

@section('title', 'Cliente | ' . $customer->first_name . ' ' . $customer->last_name)

@section('card-title', 'Información del Cliente')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $customer->first_name . ' ' . $customer->last_name }}
                </h3>
            </div>
            <div class="row col-md-12">
                <span>
                    {{ $customer->email }}
                </span>
            </div>
        </div>
        <div class="col-md-2 d-flex justify-content-end">
            <a href="{{ route('customer.edit', $customer) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
        @can('deleteCustomer', $customer)
            <div class="col-md-2">
                <a href="#" onclick="document.getElementById('delete-customer').submit()" class="btn btn-danger">
                    Eliminar
                </a>
                <form id="delete-customer"
                      method="POST"
                      action="{{ route('customer.destroy', $customer) }}"
                      class="d-none">
                    @csrf @method('DELETE')
                </form>
            </div>
        @endcan
    </div>

    <hr>

    {{-- Customer info section --}}
    @include('customers.partials.show_customer_info', $customer)

    <hr>

    {{-- Vehicles list section --}}
    @include('customers.partials.in_list_vehicles', $vehicles)

    {{-- Return button --}}
    <div class="row">
        <div class="col-md-1 offset-10">
            <a href="{{ route('customer.index') }}" class="d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        </div>
    </div>

@endsection
