<!DOCTYPE html>
<html>

<head>
    <title>Añadir persona</title>
    <!-- Agregamos la hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="my-4">Pagar/Abonar servicio</h1>
        <form action="" method="" id="formulario">
            @csrf

            <div class="form-group">
                <label for="servicio">Tipo de Servicio:</label>
                <select class="form-control" id="servicio" name="servicio" required>
                    <option value="">Seleccionar servicio...</option>
                    <option value="servicio1">LIMPIEZA</option>
                    <option value="servicio2">TRANSPORTE</option>
                    <option value="servicio3">MESAS EXTRAS</option>
                    <!-- Agregar más opciones -->
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="costo">¿Cuanto desea abonar?:</label>
                <input type="text" class="form-control" id="costo" name="costo" required>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" required>
            </div>
            <button type="submit" class="btn btn-primary">Realizar abono</button>
            <a href="{{ route('tablaserv') }}" class="btn btn-secondary">Volver</a>

        </form>
    </div>
</body>
<script>
    document.getElementById("formulario").addEventListener("submit", function() {
        alert("Gracias, el abono ha sido enviado para su procesamiento.");
    });
</script>

</html>