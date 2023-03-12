@extends('plantillas.encabezado')
@section('cuerpo')
    <div class="contenedor-evento-cliente">
        <header>
            <h1>Añadir evento</h1>
        </header>
        <form>
            <div>
                <label for="nombre">Nombre del evento:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="costo">Costo del evento:</label>
                <input type="number" id="costo" name="costo" required>
            </div>
            <div>
                <label for="mensaje">Seleccione una imagen del evento:</label>
                <input type="file" id="imagen" name="imagen" required>
            </div>
            <div>
                <label for="mensaje">Descripción del evento:</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
@endsection
