<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Domicilio
        </span>
    </div>
    <div class="col-7">
        {!! $company->address->street_address . ' ' . $company->address->outdoor_number !!}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Colonia
        </span>
    </div>
    <div class="col-7">
        {{ $company->address->colony }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Código Postal
        </span>
    </div>
    <div class="col-7">
        {{ $company->address->postal_code }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Ciudad
        </span>
    </div>
    <div class="col-7">
        {{ $company->address->city }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Estado
        </span>
    </div>
    <div class="col-7">
        {{ $company->address->state }}
    </div>
</div>

<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            País
        </span>
    </div>
    <div class="col-7">
        {{ $company->address->country }}
    </div>
</div>
