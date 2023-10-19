<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\DidResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDids extends ListRecords
{
    protected static string $resource = DidResource::class;
    
    protected static ?string $title = 'Lista de DIDs';  

}