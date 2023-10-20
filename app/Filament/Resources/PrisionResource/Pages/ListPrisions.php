<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\PrisionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrisions extends ListRecords
{
    protected static string $resource = PrisionResource::class;

    protected static ?string $title = 'Configuraciones de penales'; 

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear prision'),
        ];
    }
}
