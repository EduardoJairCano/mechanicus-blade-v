@extends('layout')

@section('title', 'Editar cliente')

@section('content')
    <h1> Editar cliente </h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @csrf @method('PATCH')
        <h3> Información Principal </h3>
        <label for="first_name"> Nombres <br>
            <input type="text" name="first_name" value="{{ old('first_name', $customer->first_name) }}">
        </label>
        <br>
        <label for="last_name"> Apellidos <br>
            <input type="text" name="last_name" value="{{ old('last_name', $customer->last_name) }}">
        </label>
        <br>
        <label for="rfc"> RFC <br>
            <input type="text" name="rfc" value="{{ old('rfc', $customer->rfc) }}">
        </label>
        <br>
        <label for="email"> Corrreo Electrónico <br>
            <input type="text" name="email" value="{{ old('email', $customer->email) }}">
        </label>
        <br>
        <label for="cell_phone_number"> Número de Teléfono Movil <br>
            <input type="text" name="cell_phone_number" value="{{ old('cell_phone_number', $customer->cell_phone_number) }}">
        </label>
        <br>

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

        <button>Actualizar</button>
    </form>

@endsection
