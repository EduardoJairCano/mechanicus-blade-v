<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{ setActive('clients') }}"><a href="{{ route('clients') }}">Clientes</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">Acerca de</a></li>
        <li><a href="{{ route('login') }}">Log Out</a></li>
    </ul>
</nav>
