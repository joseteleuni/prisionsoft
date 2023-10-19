<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\DidResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ImplementacionResource;


class ListImplementacions extends ListRecords
{
    protected static string $resource = ImplementacionResource::class;

    protected static ?string $title = 'Implementacion de penales'; 

}