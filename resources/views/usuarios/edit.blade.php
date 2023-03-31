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
                </div>
                <div class="contenedor-items">
                    <input type="hidden" name="contraseña" value="{{ $usuario->contraseña }}" required>
                    <label for="rol">Rol:</label>
                    <select name="rol">
                        <option name="rol" name="rol">Seleccionar</option>
                        <option id="opcion1" name="rol">Gerente</option>
                        <option id="opcion2" name="rol">Cliente</option>
                    </select>

                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" required>
                </div>
            </div>
            <input class="boton" type="submit" value="Guardar">
        </form>
    </div>
@endsection
