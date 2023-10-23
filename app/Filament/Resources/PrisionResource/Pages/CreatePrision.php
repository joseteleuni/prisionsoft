<?php

namespace App\Filament\Resources\PrisionResource\Pages;

use App\Filament\Resources\PrisionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\ConfigMikrotik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class CreatePrision extends CreateRecord
{
    protected static string $resource = PrisionResource::class;


    protected function afterFill(): void
    {
        Log::info('Creando registros');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.
        
        //Log::info($data);
    }
 
    
    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        //Log::info('Creando registros post-create');
    }
    

    protected function handleRecordCreation(array $data): Model
    {   
              
        $obj = new ConfigMikrotik($data);
        $obj->configuracion();

        $data['puerto_winbox']=$obj->puerto_winbox;
        $data['puerto_pbx']   =$obj->puerto_pbx;
        $data['dominio']      =$obj->dominio;
        $data['puerto_portserver'] =$obj->puerto_portserver;

        return static::getModel()::create($data);
        
    }
}
