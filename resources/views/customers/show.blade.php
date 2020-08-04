@extends('home')

@section('title', 'Cliente | ' . $customer->first_name . ' ' . $customer->last_name)

@section('card-title', 'Información del Cliente')

@section('content')

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
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
        <div class="col-md-2">
            <a href="#" onclick="document.getElementById('delete-customer').submit()" class="btn btn-danger">
                Eliminar
            </a>
            <form id="delete-customer"
                  method="POST"
                  action="{{ route('customers.destroy', $customer) }}"
                  class="d-none">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                RFC
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->rfc }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Número de Móvil
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->cell_phone_number }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Número de Casa
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->address->phone_number }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Domicilio
            </span>
        </div>
        <div class="col-md-7">
            {!! $customer->address->street_address . ' ' . $customer->address->outdoor_number !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Colonia
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->address->colony }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Código Postal
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->address->postal_code }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Municipio
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->address->city }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Estado
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->address->state }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                País
            </span>
        </div>
        <div class="col-md-7">
            {{ $customer->address->country }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <a href="{{ route('customers.index') }}" class="d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        </div>
    </div>

@endsection
