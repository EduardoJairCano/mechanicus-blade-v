@extends('layout')

@section('title', 'Clientes')

@section('content')
    <h1> Clientes </h1>

    <ul>
        @forelse($clients as $client)
            <li>{{ $client['title'] }}</li>
        @empty
            <li> No hay clientes registrados aun </li>
        @endforelse
    </ul>

@endsection
