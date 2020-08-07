@csrf

{{-- User info --}}
<div class="pb-3">
    <div class="row align-items-center">
        <h3 class="col-md-6">
        <span class="font-weight-bold">
            Información Principal
        </span>
        </h3>

        @if ($user->userInfo)
            <a href="{{ route($routeToReturn) }}" class="col-md-5 d-flex justify-content-end">
            <span>
                Regresar
            </span>
            </a>
        @endif
    </div>

    <hr>

    {{-- First Name --}}
    <div class="form-group row">
        <label for="first_name" class="col-md-3 col-form-label text-md-right"> Nombres </label>
        <div class="col-md-8">
            <input type="text"
                   id="first_name"
                   name="first_name"
                   class="form-control bg-light shadow-sm @error('first_name') is-invalid @else border-0 @enderror"
                   value="{{ old('first_name', $user->userInfo->first_name ?? '') }}">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Last Name --}}
    <div class="form-group row">
        <label for="last_name" class="col-md-3 col-form-label text-md-right"> Apellidos </label>
        <div class="col-md-8">
            <input type="text"
                   id="last_name"
                   name="last_name"
                   class="form-control bg-light shadow-sm @error('last_name') is-invalid @else border-0 @enderror"
                   value="{{ old('last_name', $user->userInfo->last_name ?? '') }}">
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- RFC --}}
    <div class="form-group row">
        <label for="rfc" class="col-md-3 col-form-label text-md-right"> RFC </label>
        <div class="col-md-8">
            <input type="text"
                   id="rfc"
                   name="rfc"
                   class="form-control bg-light shadow-sm @error('rfc') is-invalid @else border-0 @enderror"
                   value="{{ old('rfc', $user->userInfo->rfc ?? '') }}">
            @error('rfc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Cell Phone Number --}}
    <div class="form-group row">
        <label for="cell_phone_number" class="col-md-3 col-form-label text-md-right"> Teléfono Móvil </label>
        <div class="col-md-8">
            <input type="text"
                   id="cell_phone_number"
                   name="cell_phone_number"
                   class="form-control bg-light shadow-sm @error('cell_phone_number') is-invalid @else border-0 @enderror"
                   value="{{ old('cell_phone_number', $user->userInfo->cell_phone_number ?? '') }}">
            @error('cell_phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

{{-- Address info --}}
<div class="pb-3">
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
                   value="{{ old('street_address', $user->address->street_address ?? '') }}">
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
                   value="{{ old('outdoor_number', $user->address->outdoor_number ?? '') }}">
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
                   value="{{ old('interior_number', $user->address->interior_number ?? '') }}">
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
                   value="{{ old('colony', $user->address->colony ?? '') }}">
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
                   value="{{ old('postal_code', $user->address->postal_code ?? '') }}">
            @error('postal_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Municipality --}}
    <div class="form-group row">
        <label for="municipality" class="col-md-3 col-form-label text-md-right"> Municipio </label>
        <div class="col-md-8">
            <input type="text"
                   id="municipality"
                   name="municipality"
                   class="form-control bg-light shadow-sm @error('municipality') is-invalid @else border-0 @enderror"
                   value="{{ old('municipality', $user->address->municipality ?? '') }}">
            @error('municipality')
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
                   value="{{ old('state', $user->address->state ?? '') }}">
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
                   value="{{ old('country', $user->address->country ?? '') }}">
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
                   value="{{ old('phone_number', $user->address->phone_number ?? '') }}">
        </div>

        <label for="fax_number" class="col-md-2 col-form-label text-md-right"> Fax (opcional) </label>
        <div class="col-md-3">
            <input type="text"
                   id="fax_number"
                   name="fax_number"
                   class="form-control bg-light shadow-sm border-0"
                   value="{{ old('fax_number', $user->address->fax_number ?? '') }}">
        </div>
    </div>
</div>

{{-- Save button --}}
<div class="form-group row mb-0">
    <div class="col-md-3 offset-md-8">
        <button type="submit" class="btn btn-primary btn-block">
            {{ $btnText }}
        </button>
    </div>
</div>
