@extends('plantillas.encabezado')
@section('titulo')
    Editar Usuario
@endsection
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Editar Usuario</h1>
        </div>
        <form action="{{ route('usuarios.update', $usuario) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="nombre">Nombre:</label>
            <input class="element-lg" type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
            <label for="usuario">Usuario:</label>
            <input class="element-lg" id="usuario" id="usuario" name="usuario" value="{{ $usuario->usuario }}" required>
            <label for="nacimiento">Fecha de nacimiento:</label>
            <input class="element-lg" type="date" id="nacimiento" name="nacimiento" value="{{ $usuario->nacimiento }}"
                required>
            <label for="contraseña">Contraseña:</label>
            <input class="element-lg" type="text" name="contraseña" value="{{ $usuario->contraseña }}" id="contraseña"
                required>
                
            <label for="rol">Rol:</label>
            <select class="element-lg" name="rol">
                @if ($usuario->rol == 'Gerente')
                    <option name="rol" selected>Gerente</option>
                    <option name="rol">Empleado</option>
                    <option name="rol">Cliente</option>
                @elseif ($usuario->rol == 'Empleado')
                    <option name="rol" selected>Empleado</option>
                    <option name="rol">Gerente</option>
                    <option name="rol">Cliente</option>
                @else
                    <option name="rol" selected>Cliente</option>
                    <option name="rol">Gerente</option>
                    <option name="rol">Empleado</option>
                @endif
            </select>

            <div class="contenedor-form-img">
                <img id="preview" class="img-media" src="{{ asset('imagenes/1681247200-yo.jpg') }}"
                    onchange="mostrarImagen(event)" class="img-fluid">

                <div class="imagen-file">
                    <label class="imagen-t">Imagen que se mostrara en el post:</label>
                    <input type="file" name="imagen" accept="image/*" onchange="mostrarImagen(event)">
                </div>
            </div>

            <input class="element-lg" type="submit" value="Guardar">
        </form>
    </div>
@endsection
