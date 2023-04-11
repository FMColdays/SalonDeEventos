<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Imagen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function imagenable()
    {
        return $this->morphTo();
    }  
}
