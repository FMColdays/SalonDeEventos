@extends('plantillas.encabezado')
@section('titulo')
    Editar Paquete
@endsection
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

            <div class="form-group">
                <label class="element-lg" for="radio-group">Estado:</label>
                <div class="radio">
                    <label>{{ $paquete->estado == 1 ? 'Publicado' : 'No Publicado' }}</label>
                    <input style="display: inline" type="radio" name="estado"
                        value="{{ $paquete->estado == 1 ? '1' : '0' }}" checked>
                </div>
                <div class="radio">
                    <label>{{ $paquete->estado == 1 ? 'No Publicado' : 'Publicado' }}</label>
                    <input type="radio" name="estado" value="{{ $paquete->estado == 1 ? '0' : '1' }}">
                </div>
            </div>

            <div class="contenedor-form-img">
                <img id="preview" class="img-media" src="{{ asset('imagenes/boda7.png') }}"
                    onchange="mostrarImagen(event)">

                <div class="imagen-file">
                    <label class="imagen-t">Imagen que se mostrara en el post:</label>
                    <input type="file" name="imagen" accept="image/*" onchange="mostrarImagen(event)">
                </div>
            </div>
            <input class="element-lg" type="submit" value="Guardar">
        </form>
    </div>
@endsection
