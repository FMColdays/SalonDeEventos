@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-añadir-paquete">
        <div class="header-añadir-paquete">
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
            <input type="file" id="imagen" name="imagen" required>

            <div class="buttons">
                <button type="submit" name="guardar">Guardar</button>
                <button type="submit" name="actualizar">Actualizar</button>
                <button type="submit" name="modificar">Modificar</button>
                <button type="submit" name="eliminar">aliminar</button>
            </div>
    </div>
@endsection
