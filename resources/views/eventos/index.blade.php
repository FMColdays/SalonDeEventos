@extends('plantillas.encabezado')
@section('titulo')
    Editar Usuario
@endsection
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Eventos</h1>
        </div>
        <div class="paquetes">
            @foreach ($eventos as $evento)
                <div class="paquete">

                    <img src="{{ asset('imagenes/meseros.jpg') }}" alt="" class="img-fluid" width="550px">

                    <div class="descripcion">
                        <label class="estado-label" style="background: {{ $evento->estado == 1 ? 'green' : 'red' }}">
                            {{ $evento->estado == 1 ? 'Confirmado' : 'No Confirmado' }}
                        </label>

                        <div class="opciones">
                            <a class="icono material-symbols-rounded"
                                href="{{ route('eventos.show', $evento) }}">Photo_Library</a>

                            <a class="icono material-symbols-rounded edit"
                                href="{{ route('eventos.edit', $evento) }}">edit</a>

                            <form class="eliminar-alert" action="{{ route('eventos.destroy', $evento) }}" method="POST"
                                style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input class="icono material-symbols-rounded delete" type="submit" value="delete">
                            </form>
                        </div>

                        <h2>{{ $evento->nombre }}</h2>

                        <div class="items">
                            <span class="icono material-symbols-rounded">description</span>
                            <p>{{ $evento->descripcion }}</p>
                        </div>

                        <button class="contrato-icon" type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#miVentanaEmergente-{{ $evento->id }}">
                            Ver Contrato
                        </button>

                        <div class="modal" id="miVentanaEmergente-{{ $evento->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Evento: {{ $evento->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Paquete seleccionao: {{ $evento->paquete->nombre }}</p>
                                        <p>Costo: {{ $evento->costo }}</p>
                                        <p>Descripción evento: {{ $evento->descripcion }}</p>
                                        <div class="horas-c">
                                            <p>Hora de inicio : {{ $evento->horaI }}</p>
                                            <p>Hora de final: {{ $evento->horaF }}</p>
                                        </div>
                                        <p>Invitados: {{ $evento->capacidad }}</p>
                                        <p>Servicios: </p>
                                        <div class="horas-c">
                                            @foreach ($servicios as $servicio)
                                                @if (in_array($servicio->id, $evento->servicios->pluck('id')->toArray()))
                                                    <p>{{ $servicio->nombre }}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
