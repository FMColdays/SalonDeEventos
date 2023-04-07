<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Librerias boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Termina libreria boostrap   --}}

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cajas.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" href="imagenes/logo.png">
    <title>@yield('titulo')</title>
</head>

<body>
    <header class="p-3 border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <a class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none"><img
                    class="logo"src="/imagenes/logo.png"> </a>

            <ul class="nav col-20 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @if (Auth::check())
                    @if (Auth::user()->rol == 'Gerente' && Route::currentRouteName() != 'inicio')
                        @if (Route::currentRouteName() == '@me')
                            <div class="dropdown">
                                <a href="#" class="link-dark dropdown-toggle px-2" data-bs-toggle="dropdown">
                                    Usuarios
                                </a>
                                <ul class="dropdown-menu text-small">
                                    <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="{{ route('usuarios.create') }}">Agregar</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="link-dark dropdown-toggle  px-2" data-bs-toggle="dropdown">
                                    Paquetes
                                </a>
                                <ul class="dropdown-menu text-small">
                                    <li><a class="dropdown-item" href="{{ route('paquetes.index') }}">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="{{ route('paquetes.create') }}">Agregar</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="link-dark dropdown-toggle px-2" data-bs-toggle="dropdown">
                                    Servicios
                                </a>
                                <ul class="dropdown-menu text-small">
                                    <li><a class="dropdown-item" href="{{ route('tablaserv') }}">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="{{ route('paquetes.create') }}">Agregar</a></li>
                                </ul>
                            </div>
                        @endif
                    @elseif (Auth::user()->rol == 'Cliente' && Route::currentRouteName() != 'inicio')
                        @if (Route::currentRouteName() == '@me')
                            <li><a class="nav-link px-2 link-secondary" href="{{ route('eventos.index') }}">Eventos</a>
                            </li>
                        @endif
                        @if (Route::currentRouteName() == 'eventos.index')
                            <li><a class="nav-link px-2 link-secondary" href="{{ route('eventos.create') }}">Agregar</a>
                            </li>
                        @endif
                    @endif
                    @if (Route::currentRouteName() == 'evento')
                        <li><a class="nav-link px-2 link-secondary"
                                href="{{ route('añadirEventC') }}">Agregarevento</a>
                        </li>
                    @endif
                    @if (Route::currentRouteName() == 'paquetes.show')
                        <li><a class="nav-link px-2 link-secondary" href="{{ route('album.create') }}">Agregar</a>
                        </li>
                    @endif
                @endif
            </ul>

            {{-- Botón de sesión --}}
            @if (Auth::check())
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown">
                        <img src="https://media.tenor.com/Hp-lSg-ebmAAAAAM/legion-dbd.gif" width="32" height="32"
                            class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Nuevo proyecto</a></li>
                        <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                        <li><a class="dropdown-item" href="">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
            @else
                <li><a class="nav-link px-2 link-secondary" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li><a class="nav-link px-2 link-dark" href="{{ route('registrarse') }}">Registrarse</a>
                </li>
            @endif
        </div>

    </header>
    @yield('cuerpo')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
</body>

</html>
