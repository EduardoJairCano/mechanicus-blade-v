{{-- Header --}}
<div class="row">
    <h4 class="col-md-6">
        <span class="font-weight-bold">
            Domicilio
        </span>
    </h4>
</div>

<hr>

{{-- Country & State --}}
<div class="form-group row">
    <label for="country" class="col-md-3 col-form-label text-md-right"> País </label>
    <div class="col-md-3">
        <select id="country"
                name="country"
                title="Páis del Domicilio"
                class="form-control bg-light shadow-sm @error('country') is-invalid @else border-0 @enderror">
            <option value="{{ old('country', $address->country ?? '') }}">
                {{ old('country', $address->country) ?? 'Seleccione una opción' }}
            </option>
            <option value="México">México</option>
        </select>
        @error('country')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="state" class="col-md-1 col-form-label text-md-right"> Estado </label>
    <div class="col-md-4">
        <input type="text"
               id="state"
               name="state"
               title="Estado del Domicilio"
               class="form-control bg-light shadow-sm @error('state') is-invalid @else border-0 @enderror"
               value="{{ old('state', $address->state ?? '') }}">
        @error('state')
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
               title="Ciudad del Domicilio"
               class="form-control bg-light shadow-sm @error('city') is-invalid @else border-0 @enderror"
               value="{{ old('city', $address->city ?? '') }}">
        @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

{{-- Postal Code & Colony --}}
<div class="form-group row">
    <label for="postal_code" class="col-md-3 col-form-label text-md-right"> Código Postal </label>
    <div class="col-md-2">
        <input type="text"
               id="postal_code"
               name="postal_code"
               title="Código Postal del Domicilio"
               class="form-control bg-light shadow-sm @error('postal_code') is-invalid @else border-0 @enderror"
               value="{{ old('postal_code', $address->postal_code ?? '') }}">
        @error('postal_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="colony" class="col-md-2 col-form-label text-md-right"> Colonia </label>
    <div class="col-md-4">
        <input type="text"
               id="colony"
               name="colony"
               title="Colonia del Domicilio"
               class="form-control bg-light shadow-sm @error('colony') is-invalid @else border-0 @enderror"
               value="{{ old('colony', $address->colony ?? '') }}">
        @error('colony')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Strees Address --}}
<div class="form-group row">
    <label for="street_address" class="col-md-3 col-form-label text-md-right"> Calle </label>
    <div class="col-md-8">
        <input type="text"
               id="street_address"
               name="street_address"
               title="Calle del Domicilio"
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
               title="Número Exterior del Domicilio"
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
               title="Número Interior del Domicilio"
               class="form-control bg-light shadow-sm border-0"
               value="{{ old('interior_number', $address->interior_number ?? '') }}">
    </div>
</div>

{{-- Phone Number & Fax Number --}}
<div class="form-group row align-items-center">
    <label for="phone_number" class="col-md-3 col-form-label text-md-right"> Teléfono Local (opcional)</label>
    <div class="col-md-3">
        <input type="text"
               id="phone_number"
               name="phone_number"
               title="Número de Teléfono Local del {{ $type ?? 'Usuario' }}"
               class="form-control bg-light shadow-sm border-0 "
               value="{{ old('phone_number', $address->phone_number ?? '') }}">
    </div>

    <label for="fax_number" class="col-md-2 col-form-label text-md-right"> Fax (opcional) </label>
    <div class="col-md-3">
        <input type="text"
               id="fax_number"
               name="fax_number"
               title="Número de Fax del {{ $type ?? 'Usuario' }}"
               class="form-control bg-light shadow-sm border-0"
               value="{{ old('fax_number', $address->fax_number ?? '') }}">
    </div>
</div>
