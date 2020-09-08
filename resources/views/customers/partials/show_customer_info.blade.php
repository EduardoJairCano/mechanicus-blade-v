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

{{-- Address info section --}}
@include('addresses.partials.show_address_info', ['address' => $customer->address])
