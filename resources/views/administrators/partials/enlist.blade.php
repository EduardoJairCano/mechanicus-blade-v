{{-- Header & Action section --}}
<div class="row align-items-center pb-4">
    <div class="col-md-8 col-sm-8">
        <div class="row col-12">
            <h4 class="font-weight-bold text-primary">
                Administradores
            </h4>
        </div>
        <div class="row col-12">
            <span>
                Sub Usuarios
            </span>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 d-flex justify-content-end">
        @include('helpers.html-elements.buttons.aHref',
                [
                    'route' => 'administrator.create',
                    'classForButton' => 'btn btn-primary',
                    'title' => 'Agregar nuevo Administrador',
                    'message' => 'Agregar'
                ]
            )
    </div>
</div>

{{-- Administrators list --}}
<div class="row align-items-center p-2">
    @include('administrators.partials.list', ['administrators' => $subUsers])
</div>
