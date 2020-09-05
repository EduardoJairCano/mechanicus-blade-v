<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Placa
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->plate }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Marca
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->make }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Modelo
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->model }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Año
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->year }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Color
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->color }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Serie
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->serial_number }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Motor
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->engine }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Cilíndros
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->cylinder_count }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Tipo de Transmisión
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->transmission }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Tracción
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->drivetrain }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Tipo de Combustible
        </span>
    </div>
    <div class="col-7">
        {{ $vehicle->fuel }}
    </div>
</div>
