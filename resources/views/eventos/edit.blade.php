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
            <input class="element-lg  validar" type="text" id="nombre" name="nombre" value="{{ $evento->nombre }}">
            <h6 class="validarLabel" class="text-danger"></h6>

            <label for="descripcion">Descripción:</label>
            <textarea class="element-lg validar" id="descripcion" name="descripcion">{{ $evento->descripcion }}</textarea>
            <h6 class="validarLabel" class="text-danger"></h6>

            <label for="fecha">fecha:</label>
            <input class="element-lg validar" type="date" id="fecha" name="fecha" value="{{ $evento->fecha }}">
            <h6 class="validarLabel" class="text-danger"></h6>

            <label for="horaI">Hora Inicio:</label>
            <input class="element-lg validar" type="time" id="horaI" name="horaI" value="{{ $evento->horaI }}">
            <h6 class="validarLabel" class="text-danger"></h6>

            <label for="horaF">Hora Final:</label>
            <input class="element-lg validar" type="time" id="horaF" name="horaF" value="{{ $evento->horaF }}">
            <h6 class="validarLabel" class="text-danger"></h6>

            <label for="capacidad">Capacidad:</label>
            <input class="element-lg validar" type="text" id="capacidad" name="capacidad"
                value="{{ $evento->capacidad }}">
            <h6 class="validarLabel" class="text-danger"></h6>

            <label>Servicios:</label>
            <div class="contenedor-radio1">
                @foreach ($servicios as $servicio)
                    <div class="contenedor-radio2">
                        <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}" class="servicio"
                            onchange="actualizarCosto()" data-costo="{{ $servicio->costo }}"
                            @if (in_array($servicio->id, $evento->servicios->pluck('id')->toArray())) checked @endif>
                        <label>{{ $servicio->nombre }}</label>
                    </div>
                @endforeach
            </div>

            <label for="capacidad">Paquete:</label>
            <select class="element-lg" name="paquete_id" id="opcion" onchange="actualizarCosto()">

                @foreach ($paquetes as $paquete)
                    @if ($evento->paquete->id == $paquete->id)
                        <option class="paquete" value="{{ $paquete->id }}" data-costo="{{ $paquete->costo }}" selected>
                            {{ $paquete->nombre }} → {{ $paquete->costo }}
                        </option>
                    @else
                        <option class="paquete" value="{{ $paquete->id }}" data-costo="{{ $paquete->costo }}">
                            {{ $paquete->nombre }} → {{ $paquete->costo }}
                        </option>
                    @endif
                @endforeach
            </select>

            <div class="form-group">
                <label class="element-lg " for="radio-group">Estado:</label>
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
                    <input class="element-lg" type="file" name="imagen" accept="image/*"
                        onchange="mostrarImagen(event)">

                </div>
            </div>

            <div class="costo-evento">
                <input type="hidden" name="costo" id="costo" value="{{ $evento->costo }}">
                <span>Costo:</span>
                <span name="costo" id="costo-total">{{ $evento->costo }}</span>
            </div>

            <input class="element-lg" id="botonGE" type="submit" value="Guardar">
        </form>
    </div>
@endsection
