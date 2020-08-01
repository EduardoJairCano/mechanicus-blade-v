@csrf
<h3> Información Principal </h3>

<br>

<div class="form-group row">
    <label for="first_name" class="col-md-3 col-form-label text-md-right"> Nombres </label>
    <div class="col-md-6">
        <input type="text"
               id="first_name"
               name="first_name"
               class="form-control @error('first_name') is-invalid @enderror"
               value="{{ old('first_name', $customer->first_name) }}"
               required
               autocomplete="first_name">
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="last_name" class="col-md-3 col-form-label text-md-right"> Apellidos </label>
    <div class="col-md-6">
        <input type="text"
               id="last_name"
               name="last_name"
               class="form-control @error('last_name') is-invalid @enderror"
               value="{{ old('last_name', $customer->last_name) }}"
               required
               autocomplete="last_name">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="rfc" class="col-md-3 col-form-label text-md-right"> RFC </label>
    <div class="col-md-6">
        <input type="text"
               id="rfc"
               name="rfc"
               class="form-control @error('rfc') is-invalid @enderror"
               value="{{ old('rfc', $customer->rfc) }}"
               required
               autocomplete="rfc">
        @error('rfc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-3 col-form-label text-md-right"> Corrreo Electrónico </label>
    <div class="col-md-6">
        <input type="email"
               id="email"
               name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $customer->email) }}"
               required
               autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="cell_phone_number" class="col-md-3 col-form-label text-md-right"> Número de Teléfono Movil </label>
    <div class="col-md-6">
        <input type="text"
               id="cell_phone_number"
               name="cell_phone_number"
               class="form-control @error('cell_phone_number') is-invalid @enderror"
               value="{{ old('cell_phone_number', $customer->cell_phone_number) }}"
               required
               autocomplete="cell_phone_number">
        @error('cell_phone_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">
        {{ $btnText }}
    </button>
</div>
