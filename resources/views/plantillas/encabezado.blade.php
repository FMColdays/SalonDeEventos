<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cajas.css') }}" />
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
                @if (Route::currentRouteName() == '')
                    <li><a href="{{ route('login') }}">INICIAR SESIÓN</a></li>
                    <li><a href="">REGISTRARSE</a></li>
                @endif
                @if (Route::currentRouteName() == 'cliente')
                    <li><a href="{{ route('evento') }}">EVENTOS</a></li>
                    <li><a href="#">RESTAURANTE</a></li>
                    <li><a href="#">CERRAR SESIÓN</a></li>
                @endif
                @if (Route::currentRouteName() == 'evento')
                    <li><a href="">AGREGAR EVENTO</a></li>
                    <li><a href="">AGREGAR FOTO</a></li>
                @endif
                @if (Route::currentRouteName() == 'gerente')
                    <li><a style="font-size: 13px" href="{{ route('agregaru') }}">AGREGAR USUARIO</a></li>
                    <li><a style="font-size: 13px" href="{{ route('agregarp') }}">AGREGAR PAQUETE</a></li>
                    <li><a style="font-size: 13px" href="{{ route('tabla') }}">SERVICIOS</a></li>
                    <li> <a style="font-size: 13px" href="{{ route('listap') }}">PAQUETES REGISTRADOS</a></li>
                    <li><a style="font-size: 13px" href="#">CERRAR SESIÓN</a></li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('cuerpo')
</body>

</html>
