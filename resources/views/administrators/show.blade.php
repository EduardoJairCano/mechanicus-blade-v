@extends('home')

@section('title', 'Sub Usuario | ' . $administrator->userInfo->first_name . ' ' . $administrator->userInfo->last_name )

@section('card-title', 'Información del Sub Usuario')

@section('content')
    <div class="row align-items-center">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $administrator->userInfo->first_name . ' ' . $administrator->userInfo->last_name }}
                </h3>
            </div>
            <div class="row col-md-12">
                <span>
                    {{ $administrator->email }}
                </span>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <a href="{{ route('administrator.edit', $administrator) }}" class="btn btn-primary">
                Editar
            </a>
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
            {{ $administrator->userInfo->rfc }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Número de Móvil
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->userInfo->cell_phone_number }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Número de Casa
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->address->phone_number }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Domicilio
            </span>
        </div>
        <div class="col-md-7">
            {!! $administrator->address->street_address . ' ' . $administrator->address->outdoor_number !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Colonia
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->address->colony }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Código Postal
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->address->postal_code }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Ciudad
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->address->city }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Estado
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->address->state }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                País
            </span>
        </div>
        <div class="col-md-7">
            {{ $administrator->address->country }}
        </div>
    </div>

    <div class="row pb-2">
        <div class="col-md-1 offset-10">
            <a href="{{ route('userInfo.index') }}" class="d-flex justify-content-end">
            <span>
                Regresar
            </span>
            </a>
        </div>
    </div>

@endsection
