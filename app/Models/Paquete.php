<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    
    public function eventos(){
        return $this->hasMany(Evento::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
