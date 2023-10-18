<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\PrisionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrision extends EditRecord
{
    protected static string $resource = PrisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
