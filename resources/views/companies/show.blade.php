<div class="row align-items-center pb-4">
    <div class="col-md-8 col-sm-8">
        <div class="row col-12">
            <h4 class="font-weight-bold text-primary">
                Nombre de la compañia
            </h4>
        </div>
        <div class="row col-12">
            <span>
                Otro detalle de la compañia
            </span>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 d-flex justify-content-end align-content-center">
        @include('helpers.html-elements.buttons.aHref',
            [
                'route'             => 'company.create',
                'obj'               => $customer,
                'classForButton'    => 'btn btn-primary',
                'title'             => 'Agregar nueva Compañia',
                'message'           => 'Agregar'
            ]
        )
    </div>
</div>