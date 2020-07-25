@extends('layout')

@section('title', 'Editar cliente')

@section('content')
    <h1> Editar cliente </h1>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('customers.update', $customer) }}">

        @method('PATCH')

        @include('customers._form', ['btnText' => 'Actualizar'])

        {{--<h3> Domicilio </h3>
        <label for="street_address"> Calle <br>
            <input type="text" name="street_address" required>
        </label>
        <br>
        <label for="outdoor_number"> Número Exterior <br>
            <input type="text" name="outdoor_number" required>
        </label>
        <br>
        <label for="interior_number"> Número Interior <br>
            <input type="text" name="interior_number">
        </label>
        <br>
        <label for="colony"> Colonia <br>
            <input type="text" name="colony" required>
        </label>
        <br>
        <label for="postal_code"> Código Postal <br>
            <input type="number" name="postal_code" maxlength="5">
        </label>
        <br>
        <label for="city"> Ciudad <br>
            <input type="text" name="city" required>
        </label>
        <br>
        <label for="municipality"> Municipio <br>
            <input type="text" name="municipality" required>
        </label>
        <br>
        <label for="state"> Estado <br>
            <input type="text" name="state" required>
        </label>
        <br>
        <label for="country"> País <br>
            <input type="text" name="country" required>
        </label>
        <br>
        <label for="phone_number"> Número de Teléfono Local <br>
            <input type="text" name="phone_number">
        </label>
        <br>
        <label for="fax_number"> Fax <br>
            <input type="text" name="fax_number">
        </label>
        <br>
        <input hidden name="addressable_type" value="App\Customer">--}}

    </form>

@endsection
