<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gerente extends  Authenticatable
{
    use HasFactory;
    protected $fillable=['nombre','usuario','nacimiento'];

    public function paquetes(){ 
        return $this->hasMany(Paquete::class);
    }

    public function servicios(){
            return $this->hasMany(Servicio::class);
    }

    public function imagenMo()
    {
        return $this->morphOne(Imagen::class, 'imagenable');
    }
}
