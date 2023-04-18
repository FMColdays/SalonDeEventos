@extends('plantillas.encabezado')
@section('titulo')
    Gerente
@endsection

@section('cuerpo')
    <div class="contenedor">
        @foreach ($paquetes as $paquete)
            <div class="contenedor_tarjeta">
                <a href="{{ route('paquetes.show', $paquete->id) }}">
                    <figure>
                        <img src="{{ asset('imagenes/boda7.png') }}" class="frontal">
                        <figcaption class="trasera">
                            <h2 class="titulo">{{ $paquete->nombre }}</h2>
                            <hr>
                            <p>{{ $paquete->descripcion }}</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
        @endforeach
    </div>
@endsection
