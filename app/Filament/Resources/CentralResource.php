<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Models\Prision;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\PrisionResource\Pages;

class CentralResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Centrales';

    protected static ?string $navigationGroup = 'Reportes';    
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('num_gw')->label('Numero de GWs')->searchable(),
                TextColumn::make('num_tpe')->label('Numero de TPE')->searchable(),
                TextColumn::make('dominio')->label('Dominio')->searchable(), 
                TextColumn::make('puerto_pbx')->label('Puerto SSH')->searchable(), 
                
            ]) ;
    }

    public static function getPages(): array
    {   

        return [
            'index' => Pages\ListCentrals::route('/'),
        ];
    }    

}