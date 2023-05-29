@extends('plantillas.encabezado')
@section('cuerpo')
   
    @auth
        <li><a class="btn btn-success m-2" href="{{ route('album.create', ['id' => $id, 'tipo' => $tipo]) }}">Agregar
                Imagenes</a>
        </li>
    @endauth
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card-columns">
                    @foreach ($imagenes as $im)
                        <div class="card ">
                            <img class="card-img-top" src="{{ asset($im->album) }}" alt="">
                            @auth
                                <div class="card-footer">
                                    <form class="eliminar-alert" action="{{ route('album.destroy', $im->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    @endforeach
                </div>
                {{ $imagenes->links() }}
            </div>
        </div>
    </div>
    
@endsection
