@extends('plantillas.encabezado')

@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Editar Paquete de Eventos</h1>
        </div>
        <form action="{{ route('paquetes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="div-agregar">
                <div class="contenedor-items">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $paquete->nombre }}" required>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required style="width: 90%">{{ $paquete->descripcion }}</textarea>
                    <label for="costo">Costo:</label>
                    <input type="number" id="costo" name="costo" value="{{ $paquete->costo }}" required>
                </div>
                <div class="contenedor-items">
                    <label for="capacidad">Capacidad:</label>
                    <input type="text" id="capacidad" name="capacidad" value="{{ $paquete->capacidad }}" required>
                   
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" multiple accept="image/*" required>
                </div>
            </div>
            <input class="boton" type="submit" value="Guardar">
        </form>
    </div>
@endsection
