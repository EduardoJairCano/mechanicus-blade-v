<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{ setActive('customers') }}"><a href="{{ route('customers.index') }}">Clientes</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">Acerca de</a></li>
        <li><a href="{{ route('login') }}">Log Out</a></li>
    </ul>
</nav>
