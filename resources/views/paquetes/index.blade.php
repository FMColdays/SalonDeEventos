@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="lista-paquetes">
        <div class="header">
            <h1>Lista de Paquetes</h1>
        </div>
        <div class="paquetes">
            @foreach ($paquetes as $uno)
                <div class="paquete">

                    <img src="{{ asset($uno->imagen) }}" alt="" class="img-fluid" width="550px">
                    <div class="descripcion">
                        <div class="opciones">
                            <a class="icono material-symbols-rounded"
                                href="{{ route('paquetes.show', $uno->id) }}">Photo_Library</a>
                            <a class="icono material-symbols-rounded edit"
                                href="{{ route('paquetes.edit', $uno->id) }}">edit</a>

                            <form action="{{ route('paquetes.destroy', $uno->id) }}" method="POST" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <input class="icono material-symbols-rounded delete" type="submit" value="delete"
                                    style=" border-width:0">
                            </form>
                        </div>

                        <h2>{{ $uno->nombre }}</h2>


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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
