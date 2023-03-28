<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Librerias boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Termina libreria boostrap   --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cajas.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/gerente.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" href="imagenes/logo.png">
    <title>Inicio</title>
</head>

<body>
    <header class="p-3 border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none"><img
                    class="logo"src="imagenes/logo.png"> </a>

            <ul class="nav col-20 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @if (Route::currentRouteName() == 'inicio')
                    <li><a class="nav-link px-2 link-secondary" href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li><a class="nav-link px-2 link-dark" href="">Registrarse</a></li>
                @endif
                @if (Route::currentRouteName() == 'cliente')
                    <li><a class="nav-link px-2 link-secondary" href="{{ route('evento') }}">Eventos</a></li>
                    <li><a class="nav-link px-2 link-dark" href="#">Restaurante</a></li>
                @endif
                @if (Route::currentRouteName() == 'evento')
                    <li><a class="nav-link px-2 link-secondary" href="{{ route('añadirEventC') }}">Agregar evento</a>
                    </li>
                @endif
                @if (Route::currentRouteName() == 'gerente')
                    <li><a class="nav-link px-2 link-secondary" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li><a class="nav-link px-2 link-dark" href="{{ route('paquetes.index') }}">Paquetes</a></li>
                    <li><a class="nav-link px-2 link-dark" href="{{ route('tablaserv') }}">Servicios</a></li>
                @endif
                @if (Route::currentRouteName() == 'usuarios.index')
                    <li><a class="nav-link px-2 link-secondary" href="{{ route('usuarios.create') }}">agregar</a></li>
                @endif
                @if (Route::currentRouteName() == 'paquetes.index')
                    <li><a class="nav-link px-2 link-secondary" href="{{ route('paquetes.create') }}">agregar</a></li>
                @endif
            </ul>
            {{-- Botón de sesión --}}
            @if (Route::currentRouteName() != 'inicio')
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
                        <li><a class="dropdown-item" href="{{ route('inicio') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
        </div>
        @endif
    </header>
    @yield('cuerpo')
</body>

</html>
