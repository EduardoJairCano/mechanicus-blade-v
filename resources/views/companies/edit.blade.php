@extends('home')

@section('title', 'Editar Compañia')

@section('card-title', 'Editar Compañia')

@section('content')

    {{-- Edit Company form --}}
    <form method="POST" action="{{ route('company.update', $company) }}">
        @method('PATCH')
        {{-- Show Customer section --}}
        @if (isset($customer))
            <div class="pb-4">
                <div class="row align-items-center">
                    <h4 class="col-md-8 col-sm-8">
                        <span class="font-weight-bold">
                            Información del Cliente
                        </span>
                    </h4>
                    <div class="col-md-3 col-sm-4 d-flex justify-content-end">
                        @include('helpers.html-elements.buttons.aHref',
                            [
                                'route'     => 'customer.show',
                                'obj'       => $customer,
                                'title'     => 'Regresar a Información de Cliente',
                                'message'   => 'Regresar'
                            ]
                        )
                    </div>
                </div>

                <hr class="pb-2">

                <div class="row pb-3">
                    <label for="customer" class="col-3 col-form-label text-md-right "> Cliente </label>
                    <div class="col-8">
                        <input type="text"
                               id="customer"
                               name="customer"
                               class="form-control bg-light shadow-sm border-0"
                               value="{{ $customer->first_name . ' ' . $customer->last_name }}"
                               disabled>
                    </div>
                </div>
            </div>
        @endif

        @include('companies.partials._form', ['btnText' => 'Actualizar'])
    </form>

@endsection
