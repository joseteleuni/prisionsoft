<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\CentralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCentrals extends ListRecords
{
    protected static string $resource = CentralResource::class;
    
    protected static ?string $title = 'Lista de Centrales'; 

}