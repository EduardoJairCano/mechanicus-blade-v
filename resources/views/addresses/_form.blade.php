{{-- Header --}}
<div class="row">
    <h3 class="col-md-6">
        <span class="font-weight-bold">
            Domicilio
        </span>
    </h3>
</div>

<hr>

{{-- Strees Address --}}
<div class="form-group row">
    <label for="street_address" class="col-md-3 col-form-label text-md-right"> Calle </label>
    <div class="col-md-8">
        <input type="text"
               id="street_address"
               name="street_address"
               class="form-control bg-light shadow-sm @error('street_address') is-invalid @else border-0 @enderror"
               value="{{ old('street_address', $address->street_address ?? '') }}">
        @error('street_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Outdoor Number & Interior Number --}}
<div class="form-group row">
    <label for="outdoor_number" class="col-md-3 col-form-label text-md-right"> Número Exterior </label>
    <div class="col-md-2">
        <input type="text"
               id="outdoor_number"
               name="outdoor_number"
               class="form-control bg-light shadow-sm @error('outdoor_number') is-invalid @else border-0 @enderror"
               value="{{ old('outdoor_number', $address->outdoor_number ?? '') }}">
        @error('outdoor_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="interior_number" class="col-md-4 col-form-label text-md-right"> Número Interior (opcional) </label>
    <div class="col-md-2">
        <input type="text"
               id="interior_number"
               name="interior_number"
               class="form-control bg-light shadow-sm border-0"
               value="{{ old('interior_number', $address->interior_number ?? '') }}">
    </div>
</div>

{{-- Colony & Postal Code --}}
<div class="form-group row">
    <label for="colony" class="col-md-3 col-form-label text-md-right"> Colonia </label>
    <div class="col-md-4">
        <input type="text"
               id="colony"
               name="colony"
               class="form-control bg-light shadow-sm @error('colony') is-invalid @else border-0 @enderror"
               value="{{ old('colony', $address->colony ?? '') }}">
        @error('colony')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="postal_code" class="col-md-2 col-form-label text-md-right"> Código Postal </label>
    <div class="col-md-2">
        <input type="text"
               id="postal_code"
               name="postal_code"
               class="form-control bg-light shadow-sm @error('postal_code') is-invalid @else border-0 @enderror"
               value="{{ old('postal_code', $address->postal_code ?? '') }}">
        @error('postal_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- City --}}
<div class="form-group row">
    <label for="city" class="col-md-3 col-form-label text-md-right"> Ciudad </label>
    <div class="col-md-8">
        <input type="text"
               id="city"
               name="city"
               class="form-control bg-light shadow-sm @error('city') is-invalid @else border-0 @enderror"
               value="{{ old('city', $address->city ?? '') }}">
        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- State & Country --}}
<div class="form-group row">
    <label for="state" class="col-md-3 col-form-label text-md-right"> Estado </label>
    <div class="col-md-4">
        <input type="text"
               id="state"
               name="state"
               class="form-control bg-light shadow-sm @error('state') is-invalid @else border-0 @enderror"
               value="{{ old('state', $address->state ?? '') }}">
        @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="country" class="col-md-1 col-form-label text-md-right"> País </label>
    <div class="col-md-3">
        <input type="text"
               id="country"
               name="country"
               class="form-control bg-light shadow-sm @error('country') is-invalid @else border-0 @enderror"
               value="{{ old('country', $address->country ?? '') }}">
        @error('country')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Phone Number & Fax Number --}}
<div class="form-group row align-items-center">
    <label for="phone_number" class="col-md-3 col-form-label text-md-right"> Teléfono Local (opcional)</label>
    <div class="col-md-3">
        <input type="text"
               id="phone_number"
               name="phone_number"
               class="form-control bg-light shadow-sm border-0 "
               value="{{ old('phone_number', $address->phone_number ?? '') }}">
    </div>

    <label for="fax_number" class="col-md-2 col-form-label text-md-right"> Fax (opcional) </label>
    <div class="col-md-3">
        <input type="text"
               id="fax_number"
               name="fax_number"
               class="form-control bg-light shadow-sm border-0"
               value="{{ old('fax_number', $address->fax_number ?? '') }}">
    </div>
</div>
