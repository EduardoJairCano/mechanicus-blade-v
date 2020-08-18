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
    @if (is_null($administrator->email))
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

    {{-- UserInfo create/edit sectiion --}}
    @include('userInfo.partials.create-and-edit-user-info', ['userInfo' => $administrator->userInfo])

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
