@extends('plantillas.encabezado')
@section('titulo')
    Crear paquete
@endsection
@section('cuerpo')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Añadir Paquete de Eventos</h1>
        </div>
        <form action="{{ route('paquetes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nombre">Nombre:</label>
            <input class="element-lg" type="text" id="nombre" name="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea class="element-lg" id="descripcion" name="descripcion" required></textarea>
            <label for="costo">Costo:</label>
            <input class="element-lg" type="number" id="costo" name="costo" required>
            <label for="capacidad">Capacidad:</label>
            <input class="element-lg" type="text" id="capacidad" name="capacidad" required>
            <label for="servicios">Servicios:</label>
            <select class="element-lg">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Barbecue</option>
            </select>

            <div class="contenedor-form-img">
                <img id="preview" class="img-media" onchange="mostrarImagen(event)">

                <div class="imagen-file">
                    <label class="imagen-t">Imagen que se mostrara en el perfil:</label>
                    <input class="element-lg" type="file" name="imagen" accept="image/*" onchange="mostrarImagen(event)"
                        required>
                </div>
            </div>
            <input class="element-lg" type="submit" value="Guardar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
