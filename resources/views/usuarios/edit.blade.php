@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Añadir Paquete de Eventos</h1>
        </div>
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="div-agregar">
                <div class="contenedor-items">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
                    <label for="usuario">Usuario:</label>
                    <input id="usuario" id="usuario" name="usuario" value="{{ $usuario->usuario }}" required>
                    <label for="nacimiento">Fecha de nacimiento:</label>
                    <input type="date" id="nacimiento" name="nacimiento" value="{{ $usuario->nacimiento }}" required>
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="{{ $usuario->apellidos }}" required>
                </div>
                <div class="contenedor-items">
                    <label for="contraseña">Contraseña:</label>
                    <input type="text" id="contraseña" name="contraseña" value="{{ $usuario->contraseña }}" required>
                    <label for="rol">Rol:</label>
                    <input type="text" id="rol" name="rol" value="{{ $usuario->rol }}" required>
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" required>
                </div>
            </div>
            <input class="boton" type="submit" value="Guardar">
        </form>
    </div>
@endsection
