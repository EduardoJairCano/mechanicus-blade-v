<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Mechanicus </title>
</head>
<body>
    <h1>Home</h1>
    <p> Bienvenido {{ $username }} </p>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('clients') }}">Clientes</a></li>
            <li><a href="{{ route('about') }}">Acerca de</a></li>
            <li><a href="{{ route('login') }}">Log Out</a></li>
        </ul>
    </nav>
</body>
</html>
