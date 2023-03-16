@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-presentacion">
        <h1>Paquetes</h1>
        <img class="presentacion"
            src="https://www.vidanta.com/documents/34940/257206/bodas-banner.jpg/e5410766-4f94-1c88-260b-1b4086c59908?t=1562598785991">
        <input type="submit" value="Conocenos">
    </div>

    {{-- Creo las cajas --}}
    <div class="contenedor-cajas">
        @for ($i = 0; $i < 20; $i++)
            <div class="caja">
                <img class="imagen-caja"
                    src='https://static8.depositphotos.com/1377527/949/i/450/depositphotos_9499145-stock-photo-bride-and-groom-laughing.jpg'>

                <div class="caja-items">
                    <h1 class="titulo-caja">Bodas</h1>
                    <h1 class="descripcion-caja">En el mismo lugar</h1>
                    <a class="boton-caja" type="submit" href="?">Cotizar</a>
                </div>
            </div>
        @endfor
    </div>

    <footer class="footer-principal"></footer>
@endsection
