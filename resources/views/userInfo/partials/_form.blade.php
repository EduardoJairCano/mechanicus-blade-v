@csrf

{{-- User info --}}
<div class="pb-3">
    @include('userInfo.partials.create_and_edit_user_info', ['userInfo' => $user->userInfo])
</div>

{{-- Address info --}}
<div class="pb-3">
    @include('addresses.partials._form', ['address' => $user->address])
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
