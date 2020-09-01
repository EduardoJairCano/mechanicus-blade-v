{{-- RFC --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            RFC
        </span>
    </div>
    <div class="col-7">
        {{ $user->userInfo->rfc }}
    </div>
</div>

{{-- Cell Phone Number --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Móvil
        </span>
    </div>
    <div class="col-7">
        {{ $user->userInfo->cell_phone_number }}
    </div>
</div>

{{-- Phone Number --}}
<div class="row">
    <div class="col-5">
        <span class="d-flex justify-content-end font-weight-bold">
            Número de Casa
        </span>
    </div>
    <div class="col-7">
        {{ $user->address->phone_number }}
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
        {!! $user->address->street_address . ' ' . $user->address->outdoor_number !!}
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
        {{ $user->address->colony }}
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
        {{ $user->address->postal_code }}
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
        {{ $user->address->city }}
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
        {{ $user->address->state }}
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
        {{ $user->address->country }}
    </div>
</div>
