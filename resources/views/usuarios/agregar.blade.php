@extends('plantillas.encabezado')
@section('titulo')
    Agregar Usuario
@endsection
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Añadir nuevo usuario</h1>
        </div>
        <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="nombre">Nombre:</label>
            <input class="element-lg" type="text" id="nombre" name="nombre" required>
            <label for="usuario">Usuario:</label>
            <input class="element-lg" id="usuario" id="usuario" name="usuario" required>
            <label for="nacimiento">Fecha de nacimiento:</label>
            <input class="element-lg" type="date" id="nacimiento" name="nacimiento" required>

            <label for="contraseña">Contraseña:</label>
            <input class="element-lg" type="text" id="contraseña" name="contraseña" required>
            <label for="rol">Rol:</label>
            <select class="element-lg" name="rol">
                <option name="rol" name="rol">Seleccionar</option>
                <option id="opcion1" name="rol">Gerente</option>
                <option id="opcion2" name="rol">Empleado</option>
                <option id="opcion3" name="rol">Cliente</option>
            </select>
            
            <div class="contenedor-form-img">
                <img id="preview" class="img-media" onchange="mostrarImagen(event)">

                <div class="imagen-file">
                    <label class="imagen-t">Imagen que se mostrara en el perfil:</label>
                    <input class="element-lg" type="file" name="imagen" accept="image/*" onchange="mostrarImagen(event)"
                        required>
                </div>
            </div>
            <input class="element-lg" type="submit" value="Guardar">
        </form>
    </div>
@endsection
