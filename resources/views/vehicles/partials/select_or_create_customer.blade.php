{{-- Header & Action section --}}
<div class="form-group row align-items-center">
    <div class="col-md-10">
        <h4>
            <span class="font-weight-bold">
                Seleccionar Cliente
            </span>
        </h4>
    </div>
    <div class="col-md-2">
        @include('helpers.html-elements.buttons.aHref',
            [
                'route'     => $routeToReturn,
                'message'   => 'Regresar'
            ]
        )
    </div>
</div>

<hr class="pb-2">

{{-- Dropdown of Customers Selection --}}
<div class="form-group row pb-4">
    <label for="customer_id" class="col-md-2 col-form-label text-md-right "> Cliente </label>
    <div class="col-md-6">
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
    <div class="col-md-3">
        @include('helpers.html-elements.buttons.aHref',
            [
                'route'             => 'customer.create',
                'classForButton'    => 'btn btn-primary',
                'title'         => 'Agregar nuevo cliente',
                'message'       => 'Agregar ciente'
            ]
        )
    </div>
</div>
