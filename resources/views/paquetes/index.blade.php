@extends('plantillas.encabezado')
@section('titulo')
    Editar Usuario
@endsection
@section('cuerpo')

    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Paquetes</h1>
        </div>
        <div class="paquetes">
            @foreach ($paquetes as $paquete)
                <div class="paquete">

                    <img src="{{ asset('/imagenes/boda7.png') }}" alt="" class="img-fluid" width="550px">

                    <div class="descripcion">

                        <label class="estado-label" style="background: {{ $paquete->estado == 1 ? 'green' : 'red' }}">
                            {{ $paquete->estado == 1 ? 'Publicado' : 'No Publicado' }}
                        </label>

                        <div class="opciones">
                            <a class="icono material-symbols-rounded"
                                href="{{ route('paquetes.show', $paquete) }}">Photo_Library</a>
                            <a class="icono material-symbols-rounded edit"
                                href="{{ route('paquetes.edit', $paquete) }}">edit</a>

                            <form class="eliminar-alert" action="{{ route('paquetes.destroy', $paquete) }}" method="POST"
                                style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input class="icono material-symbols-rounded delete" type="submit" value="delete">
                            </form>
                        </div>

                        <h2>{{ $paquete->nombre }}</h2>
                        <div class="items">
                            <span class="icono material-symbols-rounded">group</span>
                            <p>{{ $paquete->capacidad }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">description</span>
                            <p>{{ $paquete->descripcion }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">payments</span>
                            <p>{{ $paquete->costo }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
