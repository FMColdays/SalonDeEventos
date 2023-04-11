@extends('plantillas.encabezado')
@section('cuerpo')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminado') == 'si')
        <script>
            Swal.fire(
                '¡Eliminado',
                'La imagen ha sido eliminada',
                'success'
            )
        </script>
        {{ Session::forget('eliminado') }}
    @endif

    @auth
        <li><a class="btn btn-success m-2" href="{{ route('album.create', $id) }}">Agregar Imagenes</a>
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
                                    <form class="eliminar-imagen" action="{{ route('album.destroy', $im->id) }}" class="d-inline"
                                        method="post">
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


    <script>
        var enviarBtns = document.querySelectorAll('.eliminar-imagen');
        enviarBtns.forEach(function(enviarBtn) {
            enviarBtn.addEventListener('click', function(event) {
                event.preventDefault();

                var eliminarImagen = function() {
                    this.submit();
                }

                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡Esta imagen se eliminará definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        enviarBtn.removeEventListener('click', eliminarImagen);
                        eliminarImagen.call(enviarBtn);
                    }
                })
            });
        });
    </script>
@endsection
