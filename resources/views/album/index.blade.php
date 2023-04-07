@extends('plantillas.encabezado')

@section('cuerpo')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card-columns">
                    @foreach ($imagenes as $im)
                        <div class="card ">
                            <img class="card-img-top" src="{{ asset($im->imagen) }}" alt="">
                        </div>
                    @endforeach
                </div>
                {{ $imagenes->links() }}
            </div>

        </div>
    </div>
@endsection
