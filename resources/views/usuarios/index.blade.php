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
                @foreach ($todos as $uno)
                    <tr>
                        <td>{{ $uno->nombre }}</td>
                        <td>{{ $uno->usuario }}</td>
                        <td>{{ $uno->nacimiento }}</td>
                        <td>{{ $uno->rol }}</td>
                        <td><img src="{{ asset($uno->imagen) }}" alt="" width="80px">
                        <td>
                        <td>
                            <a href="{{route('usuarios.edit',$uno->id)}}" class="icono material-symbols-rounded update">update</a>
                            <form action="{{ route('usuarios.destroy', $uno->id) }}" method="post">
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
