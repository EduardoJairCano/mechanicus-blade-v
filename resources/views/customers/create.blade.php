@extends('home')

@section('title', 'Agregar cliente')

@section('card-title', 'Agregar cliente')

@section('content')

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('customers.store') }}">

        @include('customers._form', ['btnText' => 'Guardar'])

    </form>

@endsection
