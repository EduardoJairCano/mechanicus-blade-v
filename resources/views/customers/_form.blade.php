@csrf
<h3 class="display-6"> Información Principal </h3>

<br>

<div class="form-group row">
    <label for="first_name" class="col-md-4 col-form-label text-md-right"> Nombres </label>
    <div class="col-md-7">
        <input type="text"
               id="first_name"
               name="first_name"
               class="form-control bg-light shadow-sm @error('first_name') is-invalid @else border-0 @enderror"
               value="{{ old('first_name', $customer->first_name) }}"
               required>
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="last_name" class="col-md-4 col-form-label text-md-right"> Apellidos </label>
    <div class="col-md-7">
        <input type="text"
               id="last_name"
               name="last_name"
               class="form-control bg-light shadow-sm @error('last_name') is-invalid @else border-0 @enderror"
               value="{{ old('last_name', $customer->last_name) }}"
               required>
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="rfc" class="col-md-4 col-form-label text-md-right"> RFC </label>
    <div class="col-md-7">
        <input type="text"
               id="rfc"
               name="rfc"
               class="form-control bg-light shadow-sm @error('rfc') is-invalid @else border-0 @enderror"
               value="{{ old('rfc', $customer->rfc) }}"
               required>
        @error('rfc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right"> Corrreo Electrónico </label>
    <div class="col-md-7">
        <input type="email"
               id="email"
               name="email"
               class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
               value="{{ old('email', $customer->email) }}"
               required>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="cell_phone_number" class="col-md-4 col-form-label text-md-right"> Número de Teléfono Movil </label>
    <div class="col-md-7">
        <input type="text"
               id="cell_phone_number"
               name="cell_phone_number"
               class="form-control bg-light shadow-sm @error('cell_phone_number') is-invalid @else border-0 @enderror"
               value="{{ old('cell_phone_number', $customer->cell_phone_number) }}"
               required>
        @error('cell_phone_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="col-md-3 offset-md-8">
    <button type="submit" class="btn btn-primary btn-block">
        {{ $btnText }}
    </button>
</div>
