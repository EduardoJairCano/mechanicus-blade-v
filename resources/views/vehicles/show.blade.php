@extends('home')

@section('title', 'Vehículo | ' . $vehicle->make . ' ' . $vehicle->model)

@section('card-title', 'Información del Vehículo')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $vehicle->make . ' ' . $vehicle->model . ' ' . $vehicle->year }}
                </h3>
            </div>
            <div class="row col-md-12">
                <span>
                    {{ $vehicle->owner->first_name . ' ' . $vehicle->owner->last_name }}
                </span>
            </div>
        </div>
        <div class="col-md-2 d-flex justify-content-end">
            <a href="{{ route('vehicle.edit', $vehicle) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
        @can('deleteVehicle', $vehicle)
            <div class="col-md-2">
                <a href="#" onclick="document.getElementById('delete-vehicle').submit()" class="btn btn-danger">
                    Eliminar
                </a>
                <form id="delete-vehicle"
                      method="POST"
                      action="{{ route('vehicle.destroy', $vehicle) }}"
                      class="d-none">
                    @csrf @method('DELETE')
                </form>
            </div>
        @endcan
    </div>

    <hr>

    {{-- Vehicle info section --}}
    @include('vehicles.partials.show_vehicle_info', $vehicle)

    {{-- Return button --}}
    <div class="row">
        <div class="col-md-1 offset-10">
            <a href="{{ route('vehicle.index') }}" class="d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        </div>
    </div>

@endsection
