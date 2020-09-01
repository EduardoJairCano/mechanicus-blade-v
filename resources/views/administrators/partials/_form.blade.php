@csrf

{{-- Administrator info --}}
<div class="pb-3">
    {{-- Email --}}
    @if (is_null($administrator->email))
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right"> Correo electrónico </label>
            <div class="col-md-8">
                <input type="email"
                       id="email"
                       name="email"
                       title="Correo Electrónico del Administrador"
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
    @include('userInfo.partials.create_and_edit_user_info',
        [
            'userInfo'  => $administrator->userInfo,
            'type'      => 'Administrador'
        ]
    )
</div>

{{-- Address info --}}
<div class="pb-3">
    @include('addresses.partials._form',
        [
            'address'   => $administrator->address,
            'type'      => 'Administrador'
        ]
    )
</div>

{{-- Save button --}}
<div class="form-group row mb-0">
    <div class="col-md-3 offset-md-8">
        <button type="submit"
                class="btn btn-primary btn-block"
                title="{{ $btnText ?? 'Guardar' }} información">
            {{ $btnText ?? 'Guardar' }}
        </button>
    </div>
</div>
