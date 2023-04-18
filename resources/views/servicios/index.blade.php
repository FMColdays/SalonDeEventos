@extends('plantillas.encabezado')
@section('titulo')
    Servicios
@endsection
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de servicios</h1>
        </div>
        <div class="paquetes">
            @foreach ($servicios as $servicio)
                <div class="paquete">

                    <img src="{{ asset('imagenes/meseros.jpg') }}" alt="" class="img-fluid" width="550px">

                    <div class="descripcion">
                        <label class="estado-label" style="background: {{ $servicio->estado == 1 ? 'green' : 'red' }}">
                            {{ $servicio->estado == 1 ? 'Publicado' : 'No Publicado' }}
                        </label>
                        
                        <div class="opciones">
                            <a class="icono material-symbols-rounded"
                                href="{{ route('servicios.show', $servicio) }}">Photo_Library</a>
                            <a class="icono material-symbols-rounded edit"
                                href="{{ route('servicios.edit', $servicio) }}">edit</a>

                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST"
                                style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input class="icono material-symbols-rounded delete" type="submit" value="delete">
                            </form>
                        </div>

                        <h2>{{ $servicio->nombre }}</h2>
                        <div class="items">
                            <span class="icono material-symbols-rounded">description</span>
                            <p>{{ $servicio->descripcion }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">payments</span>
                            <p>{{ $servicio->costo }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
