<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\PrisionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Modulos\ConfigMikrotik;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;



class EditPrision extends EditRecord
{
    protected static string $resource = PrisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        
        $obj = new ConfigMikrotik($data);
        $obj->configuracion();

        $data['puerto_winbox']=$obj->puerto_winbox;
        $data['puerto_pbx']   =$obj->puerto_pbx;
        $data['dominio']      =$obj->dominio;
        $data['puerto_portserver'] =$obj->puerto_portserver;

        $record->update($data);

        return $record;
    }
}
