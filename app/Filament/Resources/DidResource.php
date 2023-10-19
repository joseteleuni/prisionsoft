<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Models\Prision;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\PrisionResource\Pages;

class DidResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Numeros DIDs';

    protected static ?string $navigationGroup = 'Reportes';
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('did')->label('Numero de DID')->searchable(),

            ]) ;
    }

    public static function getPages(): array
    {   

        return [
            'index' => Pages\ListDids::route('/'),
        ];
    }    

}