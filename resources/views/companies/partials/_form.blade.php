@csrf

{{-- Company info --}}
<div class="pb-3">
    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <h4 class="col-md-8 col-sm-8">
            <span class="font-weight-bold">
                Información de la Compañia
            </span>
        </h4>
    </div>

    <hr>

    {{-- Name --}}
    <div class="form-group row align-items-center">
        <label for="name" class="col-3 col-form-label text-md-right"> Nombre de la Compañia </label>
        <div class="col-8">
            <input type="text"
                   id="name"
                   name="name"
                   title="Nombre de la Compañia"
                   class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                   value="{{ old('name', $company->name) }}">
            @error('name')
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
            'address'   => $company->address,
            'type'      => 'Compañia',
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
