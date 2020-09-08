{{-- Header & Action section --}}
<div class="row align-items-center">
    <h4 class="col-md-8 col-sm-8">
        <span class="font-weight-bold">
            Seleccionar Cliente
        </span>
    </h4>
    <div class="col-md-3 col-sm-4 d-flex justify-content-end">
        @include('helpers.html-elements.buttons.aHref',
            [
                'route'     => $routeToReturn,
                'obj'       => $customer ?? null,
                'title'     => isset($customer) ? 'Regresar a Información de Cliente' : 'Regresar a Panel de Compañias',
                'message'   => 'Regresar'
            ]
        )
    </div>
</div>

<hr class="pb-2">

{{-- Dropdown of customers selection / Create customer --}}
<div class="row pb-3">
    <label for="customer_id" class="col-2 col-form-label text-md-right "> Cliente </label>
    <div class="col-6">
        <select id="customer_id"
                name="customer_id"
                class="form-control bg-light shadow-sm @error('customer_id') is-invalid @else border-0 @enderror">
            <option value="">Seleccione un cliente</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}"
                        {{isset($customer_id) && $customer_id === $customer->id ? 'selected': ''}}>
                    {{ $customer->first_name . ' ' . $customer->last_name }}
                </option>
            @endforeach
        </select>
        @error('customer_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-4">
        @include('helpers.html-elements.buttons.aHref',
            [
                'route'             => 'customer.create',
                'classForButton'    => 'btn btn-primary',
                'title'             => 'Agregar nuevo Cliente',
                'message'           => 'Agregar Cliente'
            ]
        )
    </div>
</div>
