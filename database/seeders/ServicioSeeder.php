<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicio = new Servicio();
        $servicio->nombre = 'Mantelería';
        $servicio->descripcion = 'Para las mesas';
        $servicio->estado = '1';
        $servicio->costo = '1000';
        $servicio->gerente_id = '1';
        $servicio->save();

        $servicio->imagenMo()->create([
            'imagenMi' => 'imagenes/manteleria1.jpg',
            'imagenable_id'  => $servicio->id,
            'imagenable_type'  => Servicio::class,
        ]);

        $servicio = new Servicio();
        $servicio->nombre = 'Meseros';
        $servicio->descripcion = 'Los mejores meseros';
        $servicio->estado = '1';
        $servicio->costo = '2500';
        $servicio->gerente_id = '1';
        $servicio->save();

        $servicio->imagenMo()->create([
            'imagenMi' => 'imagenes/meseros1.jpg',
            'imagenable_id'  => $servicio->id,
            'imagenable_type'  => Servicio::class,
        ]);


        $servicio = new Servicio();
        $servicio->nombre = 'Aire acondicionado';
        $servicio->descripcion = 'Para no morir de calor';
        $servicio->estado = '1';
        $servicio->costo = '3000';
        $servicio->gerente_id = '1';
        $servicio->save();

        $servicio->imagenMo()->create([
            'imagenMi' => 'imagenes/aire1.webp',
            'imagenable_id'  => $servicio->id,
            'imagenable_type'  => Servicio::class,
        ]);

    }
}
