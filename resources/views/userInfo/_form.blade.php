@csrf

{{-- User info --}}
<div class="pb-3">
    <div class="row align-items-center">
        <h3 class="col-md-6">
            <span class="font-weight-bold">
                Información Principal
            </span>
        </h3>

        @if (isset($user->userInfo))
            <a href="{{ route($routeToReturn) }}" class="col-md-5 d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        @endif
    </div>

    <hr>

    {{-- UserInfo create/edit sectiion --}}
    @include('userInfo.partials.create-and-edit-user-info', ['userInfo' => $user->userInfo])

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
