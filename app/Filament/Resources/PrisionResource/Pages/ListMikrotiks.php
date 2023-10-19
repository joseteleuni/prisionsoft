<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\DidResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MikrotikResource;


class ListMikrotiks extends ListRecords
{
    protected static string $resource = MikrotikResource::class;

    protected static ?string $title = 'Lista de Mikrotik'; 

}