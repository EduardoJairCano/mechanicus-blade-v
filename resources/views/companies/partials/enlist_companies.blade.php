{{-- Header & Action section --}}
<div class="row align-items-center pb-2">
    <div class="col-md-8 col-sm-8">
        <div class="row col-12">
            <h4 class="font-weight-bold text-primary">
                Compañias
            </h4>
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

{{-- Companies list --}}
@if (isset($companies) && count($companies) > 0)
    <div class="row align-items-center pb-2 py-4">
        <div class="col-md-12">
            {{--@include('companies.partials.list', $companies)--}}
        </div>
    </div>
@else
    <hr>
    <div class="row-cols-md-12 d-flex justify-content-center pb-2">
        <span class="text-center text-black-50">No hay compañias registradas aún</span>
    </div>
@endif
