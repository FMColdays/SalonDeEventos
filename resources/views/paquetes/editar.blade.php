@extends('plantillas.encabezado')

@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Editar Paquete de Eventos</h1>
        </div>
        <form action="{{ route('paquetes.update', $paquete->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="nombre">Nombre:</label>
            <input class="element-lg" type="text" id="nombre" name="nombre" value="{{ $paquete->nombre }}" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required style="width: 100%; padding: 10px">{{ $paquete->descripcion }}</textarea>
            <label for="costo">Costo:</label>
            <input class="element-lg" type="number" id="costo" name="costo" value="{{ $paquete->costo }}" required>
            <label for="capacidad">Capacidad:</label>
            <input class="element-lg" type="text" id="capacidad" name="capacidad" value="{{ $paquete->capacidad }}"
                required>
            <label for="servicios">Servicios:</label>
            <input class="element-lg" type="text" id="servicios" name="servicios" value="a" required>

            <div class="form-group">
                <label class="element-lg" for="radio-group">Estado:</label>

                <div class="radio">
                    <label>Borrador</label>
                    <input style="display: inline" type="radio" name="radio-group" value="borrador" checked>
                </div>
                <div class="radio">
                    <label>Publicado</label>
                    <input type="radio" name="radio-group" value="publicado">
                </div>
            </div>

            <div class="contenedor-form-img">
                <img id="preview" class="img-media" src="{{ asset($paquete->imagenMo->imagenMi) }}"
                    onchange="mostrarImagen(event)">

                <div class="imagen-file">
                    <label class="imagen-t">Imagen que se mostrara en el post:</label>
                    <input type="file" name="imagen" accept="image/*" onchange="mostrarImagen(event)">
                </div>
            </div>
            <input class="element-lg" type="submit" value="Guardar">
        </form>
    </div>

    <script>
        function mostrarImagen(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
