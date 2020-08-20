@extends('home')

@section('title', 'Agregar cliente')

@section('card-title', 'Agregar cliente')

@section('content')

    <form method="POST" action="{{ route('customer.store') }}">

        {{-- Create/Edit customer form --}}
        @include('customers.partials._form',
            [
                'routeToReturn' => 'customer.index',
                'btnText' => 'Guardar'
            ]
        )

    </form>

@endsection
