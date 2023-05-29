<?php
namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = Cliente::where('nombre', 'Hugo')->firstOrFail();
        $paquete = Paquete::where('nombre', 'XV años')->firstOrFail();
        $serviciosIds = Servicio::all()->pluck('id');
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mis XV años Hugo 1';
        $evento->descripcion = 'Para mis XV años';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 100;
        $evento->estado = '0';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/xv años 1.jpg',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);


        $usuario = Cliente::where('nombre', 'Paco')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Fiesta infantil')->firstOrFail();
        $serviciosIds = [1, 2, 3];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mi Fiesta infantil Paco 1';
        $evento->descripcion = 'Para mi fiesta infantil';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 200;
        $evento->estado = '1';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/fiesta1.png',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);



        $usuario = Cliente::where('nombre', 'Luis')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Bautizos')->firstOrFail();
        $serviciosIds = [1];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mi bautizo Luis 1';
        $evento->descripcion = 'Para mi bautizo';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 200;
        $evento->estado = '0';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/bautizo1.webp',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);


        $usuario = Cliente::where('nombre', 'Hugo')->firstOrFail();
        $paquete = Paquete::where('nombre', 'XV años')->firstOrFail();
        $serviciosIds = [1,2];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mis XV años Hugo 2';
        $evento->descripcion = 'Para mis XV años';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 300;
        $evento->estado = '1';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/xv años 1.jpg',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);



        $usuario = Cliente::where('nombre', 'Paco')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Fiesta infantil')->firstOrFail();
        $serviciosIds = [2];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mi Fiesta infantil Paco 2';
        $evento->descripcion = 'Para mi fiesta infantil';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 100;
        $evento->estado = '0';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/fiesta1.png',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);


        $usuario = Cliente::where('nombre', 'Luis')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Bautizos')->firstOrFail();
        $serviciosIds = [3];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mi bautizo Luis 2';
        $evento->descripcion = 'Para mi bautizo';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 100;
        $evento->estado = '1';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/bautizo1.webp',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);



        $usuario = Cliente::where('nombre', 'Hugo')->firstOrFail();
        $paquete = Paquete::where('nombre', 'XV años')->firstOrFail();
   
        $evento = new Evento();
        $evento->nombre = 'Mis XV años Hugo 3';
        $evento->descripcion = 'Para mis XV años';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 100;
        $evento->estado = '0';
        $evento->costo =  $paquete->costo;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();

        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/xv años 1.jpg',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);

        

        $usuario = Cliente::where('nombre', 'Paco')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Fiesta infantil')->firstOrFail();

        $evento = new Evento();
        $evento->nombre = 'Mi Fiesta infantil Paco 3';
        $evento->descripcion = 'Para mi fiesta infantil';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 100;
        $evento->estado = '1';
        $evento->costo =  $paquete->costo;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/fiesta1.png',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);

     

        $usuario = Cliente::where('nombre', 'Luis')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Bautizos')->firstOrFail();
        $serviciosIds = [1,3];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre = 'Mi bautizo Luis 3';
        $evento->descripcion = 'Para mi bautizo';
        $evento->fecha = '2023-05-01';
        $evento->horaI = '09:00';
        $evento->horaF = '18:00';
        $evento->capacidad = 100;
        $evento->estado = '0';
        $evento->costo =  $paquete->costo + $totalServicios;
        $evento->cliente_id = $usuario->id;
        $evento->paquete_id = $paquete->id;
        $evento->save();
        $evento->servicios()->sync($serviciosIds);

        $evento->imagenMo()->create([
            'imagenMi' => 'imagenes/bautizo1.webp',
            'imagenable_id'  => $evento->id,
            'imagenable_type'  => Evento::class,
        ]);


    }
}
