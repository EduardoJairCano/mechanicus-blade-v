{{-- Header & Action section --}}
<div class="row align-items-center pb-4">
    <div class="col-md-8 col-sm-8">
        <div class="row col-12">
            <h4 class="font-weight-bold text-primary">
                Vehículos
            </h4>
        </div>
        <div class="row col-12">
            <span>
                Nombre de la compañia
            </span>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 d-flex justify-content-end align-content-center">
        @include('helpers.html-elements.buttons.aHref',
            [
                'route'             => 'vehicle.create',
                'obj'               => $customer,
                'classForButton'    => 'btn btn-primary',
                'title'             => 'Agregar nuevo vehículo',
                'message'           => 'Agregar vehículo'
            ]
        )
    </div>
</div>

{{-- List of vehicles --}}
@if (count($vehicles) > 0)
    <div class="row align-items-center pb-2">
        <div class="col-md-12">
            @include('vehicles.partials.list', $vehicles)
        </div>
    </div>
@else
    <hr>
    <div class="row-cols-md-12 d-flex justify-content-center pb-2">
        <span class="text-center text-black-50">No hay vehículos registrados aún</span>
    </div>
@endif
