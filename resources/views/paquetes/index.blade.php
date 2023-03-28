@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Paquetes</h1>
        </div>
        <div class="paquetes">
            @foreach ($todos as $uno)
                <div class="paquete">
                    <div class="fecha">{{ $uno->fecha }}</div>
                    <h2>{{ $uno->nombre }}</h2>
                    <div class="ubicacion">{{ $uno->ubicacion }}</div>
                    <p>{{ $uno->capacidad }}</p>
                    <p>{{ $uno->descripcion }}</p>
                    <p>{{ $uno->costo }}</p>
                    <p>{{ $uno->servicios }}</p>
                    <img src="{{ asset($uno->imagen) }}" alt="" class="img-fluid" width="400px">
                </div>
            @endforeach
        </div>
    </div>
@endsection
