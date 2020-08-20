<hr class="pb-4">

{{-- Header & Action section --}}
<div class="row align-items-center pb-4">
    <div class="col-md-6 offset-1">
        <div class="row col-md-12">
            <h4 class="font-weight-bold text-primary">
                Administradores
            </h4>
        </div>
        <div class="row col-md-6">
            <span>
                Sub Usuarios
            </span>
        </div>
    </div>
    <div class="col-md-4 d-flex justify-content-end">
        <a href="{{ route('administrator.create') }}" class="btn btn-primary">
            Agregar
        </a>
    </div>
</div>

{{-- Administrators list --}}
<div class="row align-items-center pb-2">
    <div class="col-md-12">
        @include('administrators.partials.list', ['administrators' => $subUsers])
    </div>
</div>
