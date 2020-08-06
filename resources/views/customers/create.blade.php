@extends('home')

@section('title', 'Agregar cliente')

@section('card-title', 'Agregar cliente')

@section('content')

    <form method="POST" action="{{ route('customers.store') }}">

        @include('customers._form',
            [
                'routeToReturn' => 'customers.index',
                'btnText' => 'Guardar'
            ]
        )

    </form>

@endsection
