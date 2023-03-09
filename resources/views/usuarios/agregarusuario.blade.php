<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href = "{{asset('css/agregaru.css')}}">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Usuarios</title>
</head>
<body>
<a href="/usuarios/gerentevista"class="exit-button">Salir</a>
</body>
</head>
<body>
	<h1>Formulario de Usuarios</h1>
	<form>
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre">
		<label for="correo">Correo electrónico:</label>
		<input type="email" id="correo" name="correo">
		<label for="telefono">Número de teléfono:</label>
		<input type="tel" id="telefono" name="telefono">
		<button type="submit" name="guardar">Guardar</button>
		<button type="submit" name="añadir">Añadir</button>
		<button type="submit" name="actualizar">Actualizar</button>
		<button type="submit" name="eliminar">Eliminar</button>
	</form> 
</body>
</html>
@yield('body')
</body>
</html>