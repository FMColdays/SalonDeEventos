@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="presentacion">
        <div class="container py-5 text-center text-white shadow-sm">
            <h1 class="display-4">Salon de eventos</h1>
            <p class="font-italic mb-0">Para todo evento, hay un momento.</p>
            <p class="font-italic">Hecho por
                <a href="https://bootstrapious.com" class="text-white"><u>FMColdays</u></a>
            </p>
            <a href="#" class="btn">Conocenos</a>
        </div>
    </div>

    <h1 class="titulo-paquetes">Paquetes</h1>

    @php
        $rutas = ['imagenes/boda7.png', 'imagenes/xv años.jpg', 'imagenes/fiesta infantil.jpg', 'imagenes/bautizo.webp'];
        $i = 0;
    @endphp


    {{-- Creo las cajas --}}
    <div class="contenedor">
        @foreach ($paquetes as $paquete)
            <div class="contenedor_tarjeta">
                <a href="{{ route('paquetes.show', $paquete->id) }}">
                    <figure>
                        <img src="{{ asset($rutas[$i]) }}" class="frontal">
                        <figcaption class="trasera">
                            <h2 class="titulo">{{ $paquete->nombre }}</h2>
                            <hr>
                            <p>{{ $paquete->descripcion }}</p>
                        </figcaption>
                    </figure>
                </a>
            </div>

            @php
                $i++;
            @endphp
        @endforeach
    </div>

    <footer>
        <p class="footer-text">Copyright© Arbore</p>
    </footer>
@endsection
