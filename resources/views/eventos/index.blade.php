@extends('plantillas.encabezado')
@section('titulo')
    Editar Usuario
@endsection
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Eventos</h1>
        </div>
        <div class="paquetes">
            @foreach ($eventos as $evento)
                <div class="paquete">

                    <img src="{{ asset('imagenes/meseros.jpg') }}" alt="" class="img-fluid" width="550px">

                    <div class="descripcion">
                        <label class="estado-label" style="background: {{ $evento->estado == 1 ? 'green' : 'red' }}">
                            {{ $evento->estado == 1 ? 'Publicado' : 'No Publicado' }}
                        </label>

                        <div class="opciones">
                            <a class="icono material-symbols-rounded"
                                href="{{ route('eventos.show', $evento) }}">Photo_Library</a>
                            @if ($evento->estado == 0)
                                <a class="icono material-symbols-rounded edit"
                                    href="{{ route('eventos.edit', $evento) }}">edit</a>

                                <form class="eliminar-alert" action="{{ route('eventos.destroy', $evento) }}" method="POST"
                                    style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <input class="icono material-symbols-rounded delete" type="submit" value="delete">
                                </form>
                            @endif



                        </div>

                        <h2>{{ $evento->nombre }}</h2>


                        <div class="items">
                            <span class="icono material-symbols-rounded">group</span>
                            <p>{{ $evento->capacidad }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">description</span>
                            <p>{{ $evento->descripcion }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">payments</span>
                            <p>{{ $evento->costo }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
