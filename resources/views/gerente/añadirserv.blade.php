<!DOCTYPE html>
<html>

<head>
    <title>Añadir persona</title>
    <!-- Agregamos la hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="my-4">Añadir Servicio</h1>
        <form action="" method="" id="formulario">
            @csrf

            <div class="form-group">
                <label for="nombre">Servicio:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <!-- Si se añaderá servicio, agregar el servicio el la lista de opciones de abonar.blade.php -->
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="number" class="form-control" id="costo" name="costo" required>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" required>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar y añadir</button>
            <a href="{{ route('tablaserv') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
<script>
    document.getElementById("formulario").addEventListener("submit", function() {
        alert("Gracias, el servicio se agregó correctamente!!");
    });
</script>
</html>