@extends('plantillas.encabezado')
@section('titulo')
    Editar Evento
@endsection
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Editar Paquete de Eventos</h1>
        </div>
        <form action="{{ route('eventos.update', $evento->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="nombre">Nombre:</label>
            <input class="element-lg" type="text" id="nombre" name="nombre" value="{{ $evento->nombre }}" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required style="width: 100%; padding: 10px">{{ $evento->descripcion }}</textarea>
            <label for="fecha">fecha:</label>
            <input class="element-lg" type="date" id="fecha" name="fecha" value="{{ $evento->fecha }}" required>
            <label for="horaI">Hora Inicio:</label>
            <input class="element-lg" type="time" id="horaI" name="horaI" value="{{ $evento->horaI }}" required>
            <label for="horaF">Hora Final:</label>
            <input class="element-lg" type="time" id="horaF" name="horaF" value="{{ $evento->horaF }}" required>
            <label for="capacidad">Capacidad:</label>
            <input class="element-lg" type="text" id="capacidad" name="capacidad" value="{{ $evento->capacidad }}"
                required>

            <div class="form-group">
                <label class="element-lg" for="radio-group">Estado:</label>
                <div class="radio">
                    <label>{{ $evento->estado == 1 ? 'Publicado' : 'No Publicado' }}</label>
                    <input style="display: inline" type="radio" name="estado"
                        value="{{ $evento->estado == 1 ? '1' : '0' }}" checked>
                </div>
                <div class="radio">
                    <label>{{ $evento->estado == 1 ? 'No Publicado' : 'Publicado' }}</label>
                    <input type="radio" name="estado" value="{{ $evento->estado == 1 ? '0' : '1' }}">
                </div>
            </div>

            <div class="contenedor-form-img">
                <img id="preview" class="img-media" src="{{ asset('imagenes/meseros.jpg') }}"
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