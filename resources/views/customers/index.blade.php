@extends('home')

@section('title', 'Clientes')

@section('card-title', 'Clientes')

@section('content')
    {{-- Actions --}}
    <a href="{{ route('customers.create') }}">Agregar nuevo cliente</a>

    {{-- Customers list --}}
    <ul>
        @forelse($customers ?? '' as $customer)
            <li><a href="{{ route('customers.show', $customer) }}"> {{ $customer->first_name . ' ' . $customer->last_name }} </a></li>
        @empty
            <li> No hay clientes registrados aun </li>
        @endforelse
    </ul>
@endsection
