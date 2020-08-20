<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                RFC
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->userInfo->rfc }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Número de Móvil
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->userInfo->cell_phone_number }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Número de Casa
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->address->phone_number }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Domicilio
            </span>
    </div>
    <div class="col-md-7">
        {!! $user->address->street_address . ' ' . $user->address->outdoor_number !!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Colonia
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->address->colony }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Código Postal
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->address->postal_code }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Ciudad
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->address->city }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                Estado
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->address->state }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
            <span class="d-flex justify-content-end font-weight-bold">
                País
            </span>
    </div>
    <div class="col-md-7">
        {{ $user->address->country }}
    </div>
</div>
