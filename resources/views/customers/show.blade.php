@extends('layout')

@section('title', 'Cliente | ' . $customer->first_name . ' ' . $customer->last_name)

@section('content')
    <h1>{{ $customer->first_name . ' ' . $customer->last_name }}</h1>
    <p>{{ $customer->email }}</p>
    <p>{{ $customer->rfc }}</p>
    <p>{{ $customer->cell_phone_number }}</p>
    <a href="{{ route('customers.edit', $customer) }}"> Editar </a>
    <br><br>
    <form method="POST" action="{{ route('customers.destroy', $customer) }}">
        @csrf @method('DELETE')
        <button>Eliminar</button>
    </form>
@endsection