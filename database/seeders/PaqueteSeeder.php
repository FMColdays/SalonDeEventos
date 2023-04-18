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
        $paquete->descripcion='Para bodas';
        $paquete->costo = '20000';
        $paquete->capacidad = '400';
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = 'Fiestas';
        $paquete->descripcion='Para fiestas';
        $paquete->costo = '10000';
        $paquete->capacidad = '200';
        $paquete->save();

    }
}
