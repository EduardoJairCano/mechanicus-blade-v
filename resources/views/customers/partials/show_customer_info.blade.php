<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            RFC
        </span>
    </div>
    <div class="col-7">
        {{ $customer->rfc }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Móvil
        </span>
    </div>
    <div class="col-7">
        {{ $customer->cell_phone_number }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Casa
        </span>
    </div>
    <div class="col-7">
        {{ $customer->address->phone_number }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Domicilio
        </span>
    </div>
    <div class="col-7">
        {!! $customer->address->street_address . ' ' . $customer->address->outdoor_number !!}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Colonia
        </span>
    </div>
    <div class="col-7">
        {{ $customer->address->colony }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Código Postal
        </span>
    </div>
    <div class="col-7">
        {{ $customer->address->postal_code }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Ciudad
        </span>
    </div>
    <div class="col-7">
        {{ $customer->address->city }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Estado
        </span>
    </div>
    <div class="col-7">
        {{ $customer->address->state }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            País
        </span>
    </div>
    <div class="col-7">
        {{ $customer->address->country }}
    </div>
</div>
