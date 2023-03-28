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
    
    {{-- Creo las cajas --}}
    <div class="contenedor">
        @foreach ($todos as $uno)
            <div class="contenedor_tarjeta">
                <a href="http://www.youtube.com">
                    <figure>
                        <img src="{{ asset($uno->imagen) }}"
                            class="frontal" alt="">
                        <figcaption class="trasera">
                            <h2 class="titulo">{{ $uno->nombre }}</h2>
                            <hr>
                            <p>{{ $uno->descripcion }}</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
        @endforeach
    </div>


    <footer class="footer-principal"></footer>
@endsection
