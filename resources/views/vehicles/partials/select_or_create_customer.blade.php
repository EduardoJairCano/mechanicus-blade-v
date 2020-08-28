<div class="form-group row align-items-center">
    <div class="col-md-10">
        <h4>
            <span class="font-weight-bold">
                Seleccionar Cliente
            </span>
        </h4>
    </div>
    <div class="col-md-2">
        <a href="{{ route($routeToReturn) }}">
            <span>
                Regresar
            </span>
        </a>
    </div>
</div>

<hr class="pb-2">

<div class="form-group row pb-4">
    <label for="customer_id" class="col-md-2 col-form-label text-md-right "> Cliente </label>
    <div class="col-md-6">
        <select id="customer_id"
                name="customer_id"
                class="form-control bg-light shadow-sm @error('customer_id') is-invalid @else border-0 @enderror">
            <option value="">Seleccione un cliente</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->first_name . ' ' . $customer->last_name }}</option>
            @endforeach
        </select>
        @error('customer_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-3">
        <a href="{{ route('customer.create') }}" class="btn btn-primary">
            <span class="">
                Agregar nuevo cliente
            </span>
        </a>
    </div>
</div>
