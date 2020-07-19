@extends('layout')

@section('title', 'Clientes')

@section('content')
    <h1> Clientes </h1>

    <ul>
        @forelse($customers as $customer)
            <li><a href="{{ route('customers.show', $customer) }}"> {{ $customer->first_name . ' ' . $customer->last_name }} </a></li>
        @empty
            <li> No hay clientes registrados aun </li>
        @endforelse
    </ul>
    
    {{--<div>
        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            <input type="text"
                   name="name"
                   placeholder="Nombre"
                   value="{{ old('name') }}">
            <br>
            {!! $errors->first('name', '<small>:message</small><br>') !!}

            <input type="email"
                   name="email"
                   placeholder="Correo Electrónico"
                   value="{{ old('email') }}">
            <br>
            {!! $errors->first('email', '<small>:message</small><br>') !!}

            <input type="text"
                   name="subject"
                   placeholder="Asunto"
                   value="{{ ('subject') }}">
            <br>
            {!! $errors->first('subject', '<small>:message</small><br>') !!}

            <textarea name="content"
                      placeholder="Mensaje"
                      value="{{ old('content') }}">

            </textarea>
            <br>
            {!! $errors->first('content', '<small>:message</small><br>') !!}

            <button>Enviar</button>
        </form>
    </div>--}}

@endsection
