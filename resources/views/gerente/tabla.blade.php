@extends('plantillas.encabezado')
@section('cuerpo')
    @php
        $cabeceraTabla = ['#', 'Servicio', 'Descripcion', 'Costo', 'Pagado(Si/No)', ' Acción'];
        $arregloEvento = ['Boda', 'Cumpleaños', 'Comunion', 'Fiesta', 'Comida'];
        $arregloIncluye = ['Incluye traje', 'Incluye pastel', 'Incluye biblia', 'Incluye globos', 'Incluye sal'];
        $arregloPrecio = ['$20,000', '$4,000', '$6,000', '$9,000', '$1,000'];
        $arregloPago = ['Si', 'No', 'No', 'Si', 'No'];
    @endphp

    <h1>Registro de Servicios</h1>
    <div><a href="{{ route('añadir') }}" class="btn btn-success">Añadir</a></div>
    <table class="table table-bordered" id="tbl_posts">
        <thead>
            <tr>
                @for ($i = 0; $i < count($cabeceraTabla); $i++)
                    <th>{{ $cabeceraTabla[$i] }}</th>
                @endfor
            </tr>
        </thead>
        <tbody id="tbl_posts_body">
            @for ($i = 0; $i < count($arregloEvento); $i++)
                <tr id="rec-1">
                    <td><span class="sn">{{ $i + 1 }}</span></td>
                    <td>{{ $arregloEvento[$i] }}</td>
                    <td>{{ $arregloIncluye[$i] }}</td>
                    <td>{{ $arregloPrecio[$i] }}</td>
                    <td>{{ $arregloPago[$i] }}</td>
                    <td>
                        <a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection
