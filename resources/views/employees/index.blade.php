@extends('home')

@section('title', 'Empleados')

@section('card-title', 'Empleados')

@section('content')
    {{-- Actions --}}
    <div class="d-flex justify-content-end align-content-center">
        <a href="{{--{{ route('customers.create') }}--}}" class="btn btn-primary">
            <span class="">
                Agregar nuevo empleado
            </span>
        </a>
    </div>

    <hr>

    {{-- Customers list --}}
    <ul>
        <li> No hay clientes registrados aun </li>
    </ul>
@endsection
