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
        $paquete = new Servicio();
        $paquete->nombre = 'Mantelería';
        $paquete->descripcion = 'Para las mesas';
        $paquete->costo = '1000';
        $paquete->save();

        $paquete = new Servicio();
        $paquete->nombre = 'Meseros';
        $paquete->descripcion = 'Para el evento';
        $paquete->costo = '1500';
        $paquete->save();
    }
}
