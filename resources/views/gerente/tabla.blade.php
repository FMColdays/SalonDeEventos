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
        <form enctype="multipart/form-data">
            <div class="well clearfix">
                <a href="{{route('añadir')}}" id="add-user-btn" class="button">Añadir</a>
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
                    <tr id="rec-1">
                        <td><span class="sn">1</span>.</td>
                        <td>Limpieza</td>
                        <td>El servicio incluye limpieza antes y despues del evento</td>
                        <td>$1700</td>
                        <td>SI</td>
                        <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    <tr id="rec-2">
                        <td><span class="sn">2</span>.</td>
                        <td>Transporte privado</td>
                        <td>Se ofrece transporte a las personas que deseen</td>
                        <td>$1000</td>
                        <td>SI</td>
                        <td><a class="btn btn-xs delete-record" data-id="2"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>

                    <tr id="rec-3">
                        <td><span class="sn">3</span>.</td>
                        <td>Cabina de fotos</td>
                        <td>Una cabina donde podrán tomarse fotos divertidas</td>
                        <td>$1500</td>
                        <td>50%</td>
                        <td><a class="btn btn-xs delete-record" data-id="3"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                </tbody>
            </table>
    </div>
    </form>

    <div style="display:none;">
        <table id="sample_table">
            <tr id="">
                <td><span class="sn"></span>.</td>
                <td>Servicio#</td>
                <td>A definir</td>
                <td>A definir </td>
                <td>-</td>
                <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
            </tr>
        </table>
    </div>

    </div>
</body>

</html>

<!-- <script type="text/javascript">
	$(document).ready(function() {
		jQuery(document).delegate('a.dd-recoard', 'click', function(e) {
			e.preventDefault();
			var content = jQuery('#sample_table tr'),
				size = jQuery('#tbl_posts >tbody >tr').length + 1,
				element = null,
				element = content.clone();
			element.attr('id', 'rec-' + size);
			element.find('.delete-record').attr('data-id', size);
			element.appendTo('#tbl_posts_body');
			element.find('.sn').html(size);
		});
		jQuery(document).delegate('a.delete-record', 'click', function(e) {
			e.preventDefault();
			var didConfirm = confirm("ADVERTENCIA:¿ESTAS SEGURO QUE QUIERES ELIMINAR?");
			if (didConfirm == true) {
				var id = jQuery(this).attr('data-id');
				var targetDiv = jQuery(this).attr('targetDiv');
				jQuery('#rec-' + id).remove();
				//regnerate index number on table
				$('#tbl_posts_body tr').each(function(index) {
					$(this).find('span.sn').html(index + 1);
				});
				return true;
			} else {
				return false;
			}
		});
	});
</script> -->