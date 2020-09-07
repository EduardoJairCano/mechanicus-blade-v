@extends('home')

@section('title', 'Cliente | ' . $customer->first_name . ' ' . $customer->last_name)

@section('card-title', 'Información del Cliente')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-8 col-sm-7">
            <div class="row col-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $customer->first_name . ' ' . $customer->last_name }}
                </h3>
            </div>
            <div class="row col-12">
                <span>
                    {{ $customer->email }}
                </span>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'             => 'customer.edit',
                    'obj'               => $customer,
                    'classForButton'    => 'btn btn-primary',
                    'title'             => 'Editar Cliente',
                    'message'           => 'Editar'
                ]
            )
        </div>
        @can('deleteCustomer', $customer)
            <div class="col-md-2 col-sm-2">
                <a href="#" onclick="document.getElementById('delete-customer').submit()"
                   title="Eliminar Cliente"
                   class="btn btn-danger">
                    Eliminar
                </a>
                <form id="delete-customer"
                      method="POST"
                      action="{{ route('customer.destroy', $customer) }}"
                      class="d-none">
                    @csrf @method('DELETE')
                </form>
            </div>
        @endcan
    </div>

    <hr>

    {{-- Customer info section --}}
    <div>
        @include('customers.partials.show_customer_info', compact('customer'))
    </div>

    <hr class="pb-4">

    {{-- Companies list section --}}
    @include('companies.partials.enlist_companies', compact('customer'))

    <hr class="pb-4">

    {{-- Vehicles list section --}}
    @include('customers.partials.enlist_vehicles',
        [
            'customer' => $customer,
            'vehicles' => $vehicles ?? null,
        ]
    )

    {{-- Return button --}}
    <div class="row">
        <div class="col-md-1 offset-10 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'     => 'customer.index',
                    'title'     => 'Regresar a Panel de Clientes',
                    'message'   => 'Regresar'
                ]
            )
        </div>
    </div>

@endsection
