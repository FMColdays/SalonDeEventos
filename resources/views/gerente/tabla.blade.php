<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Registro de Servicios</title>
</head>

<body>
    <div class="container" style="padding:50px 100px;">
        <h1>Registro de Servicios</h1>

        <div class="well clearfix">
            <a href="{{ route('añadir') }}" class="btn btn-success">Añadir</a>
        </div>
        <table class="table table-bordered" id="tbl_posts">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de servicio</th>
                    <th>Descripcion</th>
                    <th>costo</th>
                    <th>Pagado(SI/NO)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbl_posts_body">
                @for ($i = 1; $i <= 10; $i++)
                    <tr id="rec-1">
                        <td><span class="sn">{{ $i }}</span></td>
                        <td>Limpieza</td>
                        <td>El servicio incluye limpieza antes y despues del evento</td>
                        <td>$1700</td>
                        <td>SI</td>
                        <td>
                            <a class="btn btn-xs delete-record" data-id="1">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>

</html>
