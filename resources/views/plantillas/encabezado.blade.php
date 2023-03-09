<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Inicio</title>
</head>

<body>
    <nav class="navbar">
        <div class="logodiv">
            <img class="logo" src="imagenes/logo.png">
        </div>
        <div class="navbarC">
            <ul class="contenedor-registrar">
                @if (Route::currentRouteName() != 'sesion')
                    <li><a class="cae" href="{{ route('login') }}">INICIAR SESIÓN</a></li>
                    <li><a href="">REGISTRARSE</a></li>
                @endif
                @if (Route::currentRouteName() == 'sesion')
                    <li><a href="{{ route('evento') }}">EVENTOS</a></li>
                    <li><a href="">VIÑEDO</a></li>
                    <li><a href="">RESTAURANTE</a></li>
                    <li><a href="{{ route('gerente') }}">SERVICIOS</a></li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('cuerpo')
</body>

</html>
