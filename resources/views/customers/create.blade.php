@extends('home')

@section('title', 'Agregar Cliente')

@section('card-title', 'Agregar Cliente')

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
                    'route'     => 'customer.index',
                    'title'     => 'Regresar a Panel de Clientes',
                    'message'   => 'Regresar'
                ]
            )
        </div>
    </div>

    <hr>

    {{-- Create customer form --}}
    <form method="POST" action="{{ route('customer.store') }}">
        @include('customers.partials._form', ['btnText' => 'Guardar'])
    </form>

@endsection
