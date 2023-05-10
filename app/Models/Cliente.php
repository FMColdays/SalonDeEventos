<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory;
    protected $fillable=['nombre','usuario','nacimiento', 'contraseña','imagen'];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
