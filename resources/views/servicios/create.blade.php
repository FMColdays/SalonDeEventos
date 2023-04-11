@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Añadir Servicio</h1>
        </div>
        <form action="{{ route('servicios.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="div-agregar">
                <div class="contenedor-items">
                    <label for="nombre">Nombre:</label>
                    <input class="element-lg" type="text" id="nombre" name="nombre" required>
                    <label for="descripcion">Descripción:</label>
                    <textarea class="element-lg" id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="contenedor-items">
                    <label for="costo">Costo:</label>
                    <input class="element-lg" type="number" id="costo" name="costo" required>
                    <label for="imagen">Imagen:</label>
                    <input class="element-lg" type="file" name="imagen" multiple accept="image/*" required
                        onchange="mostrarImagen(event)">
                    <img id="vista-previa" >
                    
                </div>
            </div>
            <input class="element-lg" type="submit" value="Guardar">
        </form>
    </div>

   
@endsection
