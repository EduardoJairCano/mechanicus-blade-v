@extends('home')

@section('title', 'Clientes')

@section('card-title', 'Clientes')

@section('content')
    {{-- Actions --}}
    <div class="row align-items-center pb-4">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h4 class="font-weight-bold text-primary">
                    Clientes
                </h4>
            </div>
            <div class="row col-md-6">
                <span>
                    Nombre del negocio
                </span>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-content-center">
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
            <span class="">
                Agregar nuevo cliente
            </span>
            </a>
        </div>
    </div>

    {{-- Customers list section --}}
    @if (count($customers) > 0)
        <div class="row align-items-center pb-2">
            <div class="col-md-12">
                <table class="table text-black-50 text-center">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Teléfono Móvil</th>
                            <th>Correo Electrónico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>
                                <a href="{{ route('customers.show', $customer) }}">
                                    {{ $customer->first_name . ' ' . $customer->last_name }}
                                </a>
                            </td>
                            <td>{{ $customer->rfc }}</td>
                            <td>{{ $customer->cell_phone_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    @if (auth()->user()->hasRole(['owner']))
                                        <a href="#" onclick="document.getElementById('delete-customer').submit()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </a>
                                        <form id="delete-customer"
                                              method="POST"
                                              action="{{ route('customers.destroy', $customer) }}"
                                              class="d-none">
                                            @csrf @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <hr>
        <div class="row-cols-md-12 d-flex justify-content-center">
            <span class="text-center text-black-50">No hay clientes registrados aún</span>
        </div>
    @endif

@endsection
