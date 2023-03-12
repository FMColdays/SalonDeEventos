@extends('plantillas.encabezado')
@section('cuerpo')
    <div style="padding: 30px;">
        <h1 class="titulo-formulario-usuario">Formulario de Usuarios</h1>
        <form class="form-formulario-usuario">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo">
            <label for="telefono">Número de teléfono:</label>
            <input type="tel" id="telefono" name="telefono">

            <button type="submit" name="guardar">Guardar</button>
            <button type="submit" name="añadir">Añadir</button>
            <button type="submit" name="actualizar">Actualizar</button>
            <button type="submit" name="eliminar">Eliminar</button>
        </form>
    </div>
@endsection
