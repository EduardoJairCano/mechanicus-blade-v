@extends('home')

@section('title', 'Editar cliente')

@section('card-title', 'Editar cliente')

@section('content')

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('customer.update', $customer) }}">

        @method('PATCH')

        {{-- Create/Edit customer form --}}
        @include('customers.partials._form',
            [
                'routeToReturn' => 'customer.show',
                'btnText' => 'Actualizar'
            ]
        )

    </form>

@endsection
