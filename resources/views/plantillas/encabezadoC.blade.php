<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbarC">
            <a><img class="logo" src="imagenes/logo.png"></a>
            <ul>
                <li><a href="{{ route('sesion') }}">Inicio</a></li>
                <li><a href="">Agregar Evento</a></li>
                <li><a href="">Agregar Foto</a></li>
            </ul>
        </div>
    </nav>
    @yield('cuerpoC')
</body>

</html>
