@extends('home')

@section('title', 'Editar cliente')

@section('card-title', 'Editar cliente')

@section('content')

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('customers.update', $customer) }}">

        @method('PATCH')

        @include('customers._form', ['btnText' => 'Actualizar'])

    </form>

@endsection
