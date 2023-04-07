@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-agregar">
        <div class="header-agregar">
            <h1>Añadir Paquete de Eventos</h1>
        </div>
        <form action="{{ route('paquetes.store') }}" method="post" enctype="multipart/form-data"> {{-- Cambiar ruta  --}}

            @csrf
            <div class="div-agregar">
                <div class="contenedor-items">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required style="width: 90%"></textarea>
                    <label for="evento">Paquete:</label>
                    <select class="selectores">
                        @foreach ($paquetes as $paquete)
                            <option selected>Opciones</option>
                            <option value="opcion1">{{ $paquete->nombre }}</option>
                        @endforeach
                    </select>
                    <label for="servicios">Servicios:</label>
                    <select class="selectores">
                        @foreach ($paquetes as $paquete)
                            <option selected>Opciones</option>
                            <option value="opcion1">{{ $paquete->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="contenedor-items">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" required>
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen[]" multiple accept="image/*" required>
                </div>
            </div>
            <input class="boton" type="submit" value="Guardar">
        </form>
    </div>
@endsection
