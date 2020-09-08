@csrf

{{-- Customer info section --}}
<div class="pb-3">
    {{-- First Name --}}
    <div class="form-group row">
        <label for="first_name" class="col-md-4 col-form-label text-md-right"> Nombres </label>
        <div class="col-md-7">
            <input type="text"
                   id="first_name"
                   name="first_name"
                   title="Nombre(s) del Cliente"
                   class="form-control bg-light shadow-sm @error('first_name') is-invalid @else border-0 @enderror"
                   value="{{ old('first_name', $customer->first_name) }}">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Last Name --}}
    <div class="form-group row">
        <label for="last_name" class="col-md-4 col-form-label text-md-right"> Apellidos </label>
        <div class="col-md-7">
            <input type="text"
                   id="last_name"
                   name="last_name"
                   title="Apellido(s) del Cliente"
                   class="form-control bg-light shadow-sm @error('last_name') is-invalid @else border-0 @enderror"
                   value="{{ old('last_name', $customer->last_name) }}">
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- RFC --}}
    <div class="form-group row">
        <label for="rfc" class="col-md-4 col-form-label text-md-right"> RFC </label>
        <div class="col-md-7">
            <input type="text"
                   id="rfc"
                   name="rfc"
                   title="RFC del Cliente"
                   class="form-control bg-light shadow-sm @error('rfc') is-invalid @else border-0 @enderror"
                   value="{{ old('rfc', $customer->rfc) }}">
            @error('rfc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Email --}}
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right"> Corrreo Electrónico </label>
        <div class="col-md-7">
            <input type="email"
                   id="email"
                   name="email"
                   title="Correo Electrónico del Cliente"
                   class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                   value="{{ old('email', $customer->email) }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Cell Phone Number --}}
    <div class="form-group row">
        <label for="cell_phone_number" class="col-md-4 col-form-label text-md-right"> Número de Teléfono Móvil </label>
        <div class="col-md-7">
            <input type="text"
                   id="cell_phone_number"
                   name="cell_phone_number"
                   title="Número de Teléfono Móvil del Cliente"
                   class="form-control bg-light shadow-sm @error('cell_phone_number') is-invalid @else border-0 @enderror"
                   value="{{ old('cell_phone_number', $customer->cell_phone_number) }}">
            @error('cell_phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

{{-- Address info section --}}
<div class="pb-3">
    @include('addresses.partials._form',
        [
            'address'   => $customer->address,
            'type'      => 'Cliente',
        ]
    )
</div>

{{-- Button section --}}
<div class="form-group row mb-0">
    <div class="col-md-3 offset-md-8">
        <button type="submit"
                class="btn btn-primary btn-block"
                title="{{ $btnText ?? 'Guardar' }} información">
            {{ $btnText ?? 'Guardar' }}
        </button>
    </div>
</div>
