<div class="card-header"> Navegación </div>

<div class="card-body">
    <a href="{{ route('home') }}">Panel de Usuario</a><br>
    @auth
        <a href="{{ route('customers.index') }}">Clientes</a><br>
    @endauth
    <a href="{{ route('about') }}">Acerca de</a>
</div>
