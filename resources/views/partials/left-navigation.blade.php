<div class="card-header border-0"> Navegación </div>

<div class="card-body">
    <a href="{{ route('home') }}">Panel de Usuario</a><br>
    @auth
        <a href="{{ route('customers.index') }}">Clientes</a><br>
        <a href="">Compañias</a><br>
        <a href="">Vehiculos</a><br>
    @endauth
    <a href="{{ route('about') }}">Acerca de</a>
</div>
