@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Paquetes</h1>
        </div>
        <div class="paquetes">
            @for ($i = 0; $i < 5; $i++)
                <div class="paquete">
                    <div class="fecha">29 de Julio</div>
                    <h2>EVENTO DE XV AÑOS</h2>
                    <p>SALON ARBOR.</p>
                    <div class="ubicacion">Tuxtla Gutierrez, las palmas</div>
                    <a href="#" class="button">Más Información</a>
                </div>
            @endfor
        </div>
    </div>
@endsection
