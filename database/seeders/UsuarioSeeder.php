<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario();
        $usuario->nombre = 'Erick González Pérez';
        $usuario->usuario='FMColdays';
        $usuario->contraseña = Hash::make('a'); //a
        $usuario->nacimiento = '2001-01-14';
        $usuario->rol = 'Gerente';
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = 'Emma';
        $usuario->usuario='EmmaXD';
        $usuario->contraseña = Hash::make('b'); //b
        $usuario->nacimiento = '2001-08-18';
        $usuario->rol = 'Empleado';
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = 'Angel';
        $usuario->usuario='Angel18';
        $usuario->contraseña = Hash::make('c'); //c
        $usuario->nacimiento = '2001-05-12';
        $usuario->save();
    }
    
}
