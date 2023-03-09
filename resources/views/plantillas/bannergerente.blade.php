<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Inicio</title>
    <link rel= "stylesheet" href="/css/app.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar">
        <div class="navbarC">
            <a><img class="logo" src="imagenes/logo.png"></a>
            <ul>
                
                    
                <div class="button-container">
                <a href="/usuarios/agregarusuario" id="add-user-btn" class="button">Agregar Usuario</a>
                <a href="/usuarios/agregarpaquetes" id="view-packages-btn" class="button">Agregar Paquete</a>
                <a href="/usuarios/listadepaquetes"  id="add-package-btn" class="button">Ver Lista de Paquetes Registrados</a>
                
                
                </div>
                            </ul>
        </div>
    </nav>
    @yield('body')
</body>

</html>
