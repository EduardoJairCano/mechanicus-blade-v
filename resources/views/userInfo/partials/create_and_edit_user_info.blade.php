{{-- First Name --}}
<div class="form-group row">
    <label for="first_name" class="col-md-3 col-form-label text-md-right"> Nombres </label>
    <div class="col-md-8">
        <input type="text"
               id="first_name"
               name="first_name"
               title="Nombre(s) del {{ $type ?? 'Usuario' }}"
               class="form-control bg-light shadow-sm @error('first_name') is-invalid @else border-0 @enderror"
               value="{{ old('first_name', $userInfo->first_name ?? '') }}">
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
               title="Apellio(s) del {{ $type ?? 'Usuario' }}"
               class="form-control bg-light shadow-sm @error('last_name') is-invalid @else border-0 @enderror"
               value="{{ old('last_name', $userInfo->last_name ?? '') }}">
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
               title="RFC del {{ $type ?? 'Usuario' }}"
               class="form-control bg-light shadow-sm @error('rfc') is-invalid @else border-0 @enderror"
               value="{{ old('rfc', $userInfo->rfc ?? '') }}">
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
               title="Número de Teléfono Móvil del {{ $type ?? 'Usuario' }}"
               class="form-control bg-light shadow-sm @error('cell_phone_number') is-invalid @else border-0 @enderror"
               value="{{ old('cell_phone_number', $userInfo->cell_phone_number ?? '') }}">
        @error('cell_phone_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
