@extends('plantillas.encabezado')
@section('cuerpo')
    {{-- Creo las cajas --}}
    <div class="contenedor-cajas">
        @for ($i = 1; $i < 9; $i++)
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
@endsection
