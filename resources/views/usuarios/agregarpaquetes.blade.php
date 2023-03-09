<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/agregarpa.css') }}">
    <title>Document</title>
</head>

<body>
    <style>
    </style>
    </head>

    <body>
        <a href="gerentevista"class="exit-button">Salir</a>
    </body>
    <style>
    </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h1>Añadir Paquete de Eventos</h1>
            </div>
            <form>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" required>
                <label for="imagen">Imagen:</label>
                <input type="text" id="imagen" name="imagen" required>
                <div class="buttons">
                    <button type="submit" name="guardar">Guardar</button>
                    <button type="submit" name="actualizar">Actualizar</button>
                    <button type="submit" name="modificar">Modificar</button>
                    <button type="submit" name="eliminar">aliminar</button>
                </div>
                @yield('body')
    </body>

</html>
