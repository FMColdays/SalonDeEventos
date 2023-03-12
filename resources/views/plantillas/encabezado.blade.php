<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cajas.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/gerente.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Inicio</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>
        <a href="#" class="enlace"><img class="logo" src="imagenes/logo.png"></a>
        <ul class="contenedor-navbar">
            @if (Route::currentRouteName() == '')
                <li><a class="active" href="{{ route('login') }}">INICIAR SESIÓN</a></li>
                <li><a href="">REGISTRARSE</a></li>
            @endif
            @if (Route::currentRouteName() == 'cliente')
                <li><a class="active" href="{{ route('evento') }}">EVENTOS</a></li>
                <li><a href="#">RESTAURANTE</a></li>
                <li><a href="#">CERRAR SESIÓN</a></li>
            @endif
            @if (Route::currentRouteName() == 'evento')
                <li><a class="active" href="">AGREGAR EVENTO</a></li>
                <li><a href="">AGREGAR FOTO</a></li>
            @endif
            @if (Route::currentRouteName() == 'gerente')
                <li><a class="active" href="{{ route('agregaru') }}">AGREGAR USUARIO</a></li>
                <li><a href="{{ route('agregarp') }}">AGREGAR PAQUETE</a></li>
                <li><a href="{{ route('tablaserv') }}">SERVICIOS</a></li>
                <li><a href="{{ route('listap') }}">PAQUETES REGISTRADOS</a></li>
                <li><a href="#">CERRAR SESIÓN</a></li>
            @endif
            

        </ul>
    </nav>
    @yield('cuerpo')
</body>

</html>