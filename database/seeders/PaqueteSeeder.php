<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paquete = new Paquete();
        $paquete->nombre = 'Bodas';
        $paquete->descripcion = 'Para bodas';
        $paquete->costo = '20000';
        $paquete->estado = '1';
        $paquete->capacidad = '400';
        $paquete->gerente_id = '1';
        $paquete->save();
        $paquete->imagenMo()->create([
            'imagenMi' => 'imagenes/boda1.jpeg',
            'imagenable_id'  => $paquete->id,
            'imagenable_type'  => Paquete::class,
        ]);

        $paquete = new Paquete();
        $paquete->nombre = 'XV años';
        $paquete->descripcion = 'Para XV años';
        $paquete->costo = '10000';
        $paquete->estado = '1';
        $paquete->capacidad = '200';
        $paquete->gerente_id = '1';
        $paquete->save();
        $paquete->imagenMo()->create([
            'imagenMi' => 'imagenes/xv años 1.jpg',
            'imagenable_id'  => $paquete->id,
            'imagenable_type'  => Paquete::class,
        ]);

        $paquete = new Paquete();
        $paquete->nombre = 'Fiesta infantil';
        $paquete->descripcion = 'Para fiesta infantil';
        $paquete->costo = '5000';
        $paquete->estado = '1';
        $paquete->capacidad = '400';
        $paquete->gerente_id = '1';
        $paquete->save();

        $paquete->imagenMo()->create([
            'imagenMi' => 'imagenes/fiesta1.png',
            'imagenable_id'  => $paquete->id,
            'imagenable_type'  => Paquete::class,
        ]);

        $paquete = new Paquete();
        $paquete->nombre = 'Bautizos';
        $paquete->descripcion = 'Para bautizos';
        $paquete->costo = '8000';
        $paquete->estado = '1';
        $paquete->capacidad = '200';
        $paquete->gerente_id = '1';
        $paquete->save();

        $paquete->imagenMo()->create([
            'imagenMi' => 'imagenes/bautizo1.webp',
            'imagenable_id'  => $paquete->id,
            'imagenable_type'  => Paquete::class,
        ]);
    }
}
