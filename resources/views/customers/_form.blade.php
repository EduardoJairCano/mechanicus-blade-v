@csrf

<h3> Información Principal </h3>
<label for="first_name"> Nombres <br>
    <input type="text"
           name="first_name"
           value="{{ old('first_name', $customer->first_name) }}">
</label>
<br>
<label for="last_name"> Apellidos <br>
    <input type="text"
           name="last_name"
           value="{{ old('last_name', $customer->last_name) }}">
</label>
<br>
<label for="rfc"> RFC <br>
    <input type="text"
           name="rfc"
           value="{{ old('rfc', $customer->rfc) }}">
</label>
<br>
<label for="email"> Corrreo Electrónico <br>
    <input type="text"
           name="email"
           value="{{ old('email', $customer->email) }}">
</label>
<br>
<label for="cell_phone_number"> Número de Teléfono Movil <br>
    <input type="text"
           name="cell_phone_number"
           value="{{ old('cell_phone_number', $customer->cell_phone_number) }}">
</label>
<br><br>

<button>{{ $btnText }}</button>
