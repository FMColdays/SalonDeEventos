@extends('plantillas.encabezado')
@section('titulo')
    Editar Paquete
@endsection
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Editar servicio</h1>
        </div>
        <form action="{{ route('servicios.update', $servicio) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="nombre">Nombre:</label>
            <input class="element-lg" type="text" id="nombre" name="nombre"  value="{{ old('nombre', $servicio->nombre) }}" >
            @error('nombre')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" style="width: 100%; padding: 10px">{{ old('descripcion', $servicio->descripcion) }}</textarea>
            @error('descripcion')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <label for="costo">Costo:</label>
            <input class="element-lg" type="number" id="costo" name="costo" value="{{ old('costo', $servicio->costo) }}" >
            @error('costo')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror


            <div class="form-group">
                <label class="element-lg" for="radio-group">Estado:</label>
                <div class="radio">
                    <label>{{ $servicio->estado == 1 ? 'Publicado' : 'No Publicado' }}</label>
                    <input style="display: inline" type="radio" name="estado"
                        value="{{ $servicio->estado == 1 ? '1' : '0' }}" checked>
                </div>
                <div class="radio">
                    <label>{{ $servicio->estado == 1 ? 'No Publicado' : 'Publicado' }}</label>
                    <input type="radio" name="estado" value="{{ $servicio->estado == 1 ? '0' : '1' }}">
                </div>
            </div>

            <div class="contenedor-form-img">
                <img id="preview" class="img-media" src="{{ asset(optional($servicio->imagenMo)->imagenMi) }}"
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
