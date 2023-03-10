@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-cajas">
        @for ($i = 1; $i < 9; $i++)
            <div class="cajas">
                <div class="caja-imagen"> </div>

                <div class="caja-items">
                    <h1 class="titulo">Bodas</h1>
                    <h1 class="cuerpo">En el mismo lugar</h1>
                    <a class="boton" type="submit" href="?">Cotizar</a>
                </div>
            </div>
        @endfor
    </div>
@endsection
