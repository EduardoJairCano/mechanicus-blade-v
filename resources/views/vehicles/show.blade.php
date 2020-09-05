@extends('home')

@section('title', 'Vehículo | ' . $vehicle->make . ' ' . $vehicle->model)

@section('card-title', 'Información del Vehículo')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-8 col-sm-7">
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
        <div class="col-md-2 col-sm-2 d-flex justify-content-end">
            <a href="{{ route('vehicle.edit', $vehicle) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
        @can('deleteVehicle', $vehicle)
            <div class="col-md-2 col-sm-2">
                <a href="#" onclick="document.getElementById('delete-vehicle').submit()"
                   title="Eliminar Vehículo"
                   class="btn btn-danger">
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
    <div>
        @include('vehicles.partials.show_vehicle_info', compact('vehicle'))
    </div>

    {{-- Return button --}}
    <div class="row">
        <div class="col-md-1 offset-10 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'             => 'customer.show',
                    'obj'               => $vehicle->owner,
                    'title'             => 'Regresar a Información de Cliente',
                    'message'           => 'Regresar'
                ]
            )
        </div>
    </div>

@endsection
