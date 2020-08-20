@extends('home')

@section('title', 'Agregar cliente')

@section('card-title', 'Agregar cliente')

@section('content')

    <form method="POST" action="{{ route('customers.store') }}">

        {{-- Create/Edit customer form --}}
        @include('customers.partials._form',
            [
                'routeToReturn' => 'customers.index',
                'btnText' => 'Guardar'
            ]
        )

    </form>

@endsection
