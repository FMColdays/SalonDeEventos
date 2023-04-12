<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    public function imagenMo(){
        return $this->morphOne(Imagen::class, 'imagenable');
    }

    public function albumMo(){
        return $this->hasMany(Album::class);
    }
}
