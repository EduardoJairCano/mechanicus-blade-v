@extends('home')

@section('title', 'Clientes')

@section('card-title', 'Clientes')

@section('content')
    {{-- Actions --}}
    <div class="d-flex justify-content-end align-content-center">
        <a href="{{ route('customers.create') }}" class="btn btn-primary">
            <span class="">
                Agregar nuevo cliente
            </span>
        </a>
    </div>

    <hr>

    {{-- Customers list --}}
    <ul>
        @forelse($customers as $customer)
            <li><a href="{{ route('customers.show', $customer) }}"> {{ $customer->first_name . ' ' . $customer->last_name }} </a></li>
        @empty
            <li> No hay clientes registrados aun </li>
        @endforelse
    </ul>
@endsection
