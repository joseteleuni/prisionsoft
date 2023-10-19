<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Fo;
use App\Enums\Implementacion;
use App\Enums\Starlink;
use App\Enums\Vpn;

class Prision extends Model
{
    use HasFactory;

    protected $casts = [
        'fo' => Fo::class,
        'implementacion' => Implementacion::class,
        'starlink' => Starlink::class,
        'vpn' => Vpn::class,

    ];
    

    
}
