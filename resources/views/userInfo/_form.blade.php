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
    @include('addresses._form', ['address' => $user->address])
</div>

{{-- Save button --}}
<div class="form-group row mb-0">
    <div class="col-md-3 offset-md-8">
        <button type="submit" class="btn btn-primary btn-block">
            {{ $btnText }}
        </button>
    </div>
</div>
