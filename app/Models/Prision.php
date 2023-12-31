<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Departamento;

//
use App\Enums\Status;
use App\Enums\Implementacion;
//use App\Enums\Starlink;
// use App\Enums\Vpn;


class Prision extends Model
{
    use HasFactory;

    protected $casts = [
        'fo' => Status::class,
        'implementacion' => Implementacion::class,
        'starlink' => Status::class,
        'vpn' => Status::class,

    ];
    
    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
    
    public function dids(): HasMany
    {
        return $this->hasMany(Did::class);
    }
    
}
