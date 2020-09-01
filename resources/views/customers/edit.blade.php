@extends('home')

@section('title', 'Editar Cliente')

@section('card-title', 'Editar Cliente')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <h3 class="col-md-8 col-sm-8">
            <span class="font-weight-bold">
                Información Principal
            </span>
        </h3>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'     => 'customer.show',
                    'obj'       => $customer,
                    'title'     => 'Regresar a Información del Cliente',
                    'message'   => 'Regresar'
                ]
            )
        </div>
    </div>

    <hr>

    {{-- Edit customer form --}}
    <form method="POST" action="{{ route('customer.update', $customer) }}">
        @method('PATCH')
        @include('customers.partials._form', ['btnText' => 'Actualizar'])
    </form>

@endsection
