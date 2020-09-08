{{-- Phone Number --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Casa
        </span>
    </div>
    <div class="col-7">
        {{ $address->phone_number }}
    </div>
</div>

{{-- Outdoor Number --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Domicilio
        </span>
    </div>
    <div class="col-7">
        {!! $address->street_address . ' ' . $address->outdoor_number . ' ' . $address->interior_number !!}
    </div>
</div>

{{-- Colony --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Colonia
        </span>
    </div>
    <div class="col-7">
        {{ $address->colony }}
    </div>
</div>

{{-- Postal Code --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Código Postal
        </span>
    </div>
    <div class="col-7">
        {{ $address->postal_code }}
    </div>
</div>

{{-- City --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Ciudad
        </span>
    </div>
    <div class="col-7">
        {{ $address->city }}
    </div>
</div>

{{-- State --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Estado
        </span>
    </div>
    <div class="col-7">
        {{ $address->state }}
    </div>
</div>

{{-- Country --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            País
        </span>
    </div>
    <div class="col-7">
        {{ $address->country }}
    </div>
</div>