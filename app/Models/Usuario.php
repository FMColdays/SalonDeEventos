<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    public function eventos(){
        return $this->hasMany(Evento::class);
    }

    public function paquetes(){
        return $this->hasMany(Paquete::class);
    }
}
