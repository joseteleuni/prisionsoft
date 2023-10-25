<?php

namespace App\Filament\Resources\DidResource\Pages;

use App\Filament\Resources\DidResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDid extends EditRecord
{
    protected static string $resource = DidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
