@csrf

{{-- New company info inputs --}}
<div class="pb-2">
    {{-- Header --}}
    <div class="row align-items-center">
        <h4 class="col-md-8 col-sm-8">
            <span class="font-weight-bold">
                Información de la Compañia
            </span>
        </h4>
        @if (isset($customer->id))
            <div class="col-md-3 col-sm-4 d-flex justify-content-end">
                @include('helpers.html-elements.buttons.aHref',
                    [
                        'route'             => 'customer.show',
                        'obj'               => $customer,
                        'title'             => 'Regresar a Información de Cliente',
                        'message'           => 'Regresar'
                    ]
                )
            </div>
        @endif
    </div>

    <hr class="pb-2">

    {{-- Name --}}
    <div class="form-group row align-items-center">
        <label for="name" class="col-md-4 col-form-label text-md-right"> Nombre de la Compañia </label>
        <div class="col-md-7">
            <input type="text"
                   id="name"
                   name="name"
                   class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                   value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

{{-- Address info section --}}
<div class="pb-2">
    @include('addresses.partials._form')
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
