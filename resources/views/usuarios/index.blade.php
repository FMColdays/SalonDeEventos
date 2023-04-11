@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-tabla-usuarios">
        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Nacimiento</th>
                    <th>Rol</th>
                    <th>Imagen</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->usuario }}</td>
                        <td>{{ $usuario->nacimiento }}</td>
                        <td>{{ $usuario->rol }}</td>
                        <td><img src="{{ optional($usuario->imagenMo)->imagenMi }}" alt="" width="80px">
                        <td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                class="icono material-symbols-rounded update">edit</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post"
                                style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input class="icono material-symbols-rounded delete" type="submit" value="delete"
                                    style=" border-width:0">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
