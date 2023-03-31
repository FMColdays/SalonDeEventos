@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Paquetes</h1>
        </div>
        <div class="paquetes">
            @foreach ($todos as $uno)
                <div class="paquete">
                    @foreach ($imagenes as $dos)
                        <img src="{{ asset($dos->imagen) }}" alt="" class="img-fluid" width="400px">
                    @endforeach
                    <div class="descripcion">

                        <div class="opciones">
                            <a class="icono material-symbols-rounded edit" href="#">edit</a>
                            <a class="icono material-symbols-rounded delete" href="#">delete</a>
                        </div>

                        <h2>{{ $uno->nombre }}</h2>

                        <div class="items">
                            <span class="icono material-symbols-rounded">location_on</span>
                            <p class="ubicacion">{{ $uno->ubicacion }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">group</span>
                            <p>{{ $uno->capacidad }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">description</span>
                            <p>{{ $uno->descripcion }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">payments</span>
                            <p>{{ $uno->costo }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">design_services</span>
                            <p>{{ $uno->servicios }}</p>
                        </div>
                        <div class="items">
                            <span class="icono material-symbols-rounded">calendar_month</span>
                            <p>{{ $uno->fecha }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
