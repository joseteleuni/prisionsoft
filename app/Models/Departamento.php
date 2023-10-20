<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prision;


class Departamento extends Model
{
    use HasFactory;

    public function prisions(): HasMany
    {
        return $this->hasMany(Prision::class);
    }
    
}
