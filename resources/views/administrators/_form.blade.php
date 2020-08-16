@csrf

{{-- Main info --}}
<div class="pb-3">
    <div class="row align-items-center">
        <h3 class="col-md-6">
            <span class="font-weight-bold">
                Información Principal
            </span>
        </h3>

        @if (isset($administrator->userInfo))
            <a href="{{ route('administrator.show', $administrator) }}" class="col-md-5 d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        @endif
    </div>

    <hr>

    {{-- Email --}}
    @if (!isset($administrator->email))
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right"> Correo electrónico </label>
            <div class="col-md-8">
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                       value="{{ old('email', $administrator->email ?? '') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    @endif

    {{-- First Name --}}
    <div class="form-group row">
        <label for="first_name" class="col-md-3 col-form-label text-md-right"> Nombres </label>
        <div class="col-md-8">
            <input type="text"
                   id="first_name"
                   name="first_name"
                   class="form-control bg-light shadow-sm @error('first_name') is-invalid @else border-0 @enderror"
                   value="{{ old('first_name', $administrator->userInfo->first_name ?? '') }}">
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
                   value="{{ old('last_name', $administrator->userInfo->last_name ?? '') }}">
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
                   value="{{ old('rfc', $administrator->userInfo->rfc ?? '') }}">
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
                   value="{{ old('cell_phone_number', $administrator->userInfo->cell_phone_number ?? '') }}">
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
    @include('addresses._form', ['address' => $administrator->address])
</div>

{{-- Save button --}}
<div class="form-group row mb-0">
    <div class="col-md-3 offset-md-8">
        <button type="submit" class="btn btn-primary btn-block">
            {{ $btnText }}
        </button>
    </div>
</div>
