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
    
    <div>
        <form method="POST" action="{{ route('clients') }}">
            @csrf
            <input type="text" name="name" placeholder="Nombre"><br>
            <input type="email" name="email" placeholder="Correo Electrónico"><br>
            <input type="text" name="subject" placeholder="Asunto"><br>
            <textarea name="content" placeholder="Mensaje"></textarea><br>
            <button>Enviar</button>
        </form>
    </div>

@endsection
