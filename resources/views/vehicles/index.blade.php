@extends('home')

@section('title', 'Vehículos')

@section('card-title', 'Vehículos')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center pb-4">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h4 class="font-weight-bold text-primary">
                    Vehículos
                </h4>
            </div>
            <div class="row col-md-6">
                <span>
                    Nombre del negocio
                </span>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-content-center">
            <a href="{{ route('vehicle.create') }}" class="btn btn-primary">
                <span class="">
                    Agregar nuevo vehiculo
                </span>
            </a>
        </div>
    </div>

    {{-- Vehicles list section --}}
    @if (count($vehicles) > 0)
        <div class="row align-items-center pb-2">
            <div class="col-md-12">
                @include('vehicles.partials.list', $vehicles)
            </div>
        </div>
    @else
        <hr>
        <div class="row-cols-md-12 d-flex justify-content-center">
            <span class="text-center text-black-50">No hay vehículos registrados aún</span>
        </div>
    @endif

@endsection
