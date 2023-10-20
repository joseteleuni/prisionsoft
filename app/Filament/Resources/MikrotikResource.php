<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Models\Prision;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\PrisionResource\Pages;

class MikrotikResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationLabel = 'Mikrotiks';

    protected static ?string $navigationGroup = 'Reportes';
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('codigo')->searchable(),
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('dominio')->label('Dominio')->searchable(),
                TextColumn::make('puerto_winbox')->label('Puerto Winbox')->searchable(),

            ])
            ->defaultSort('codigo', 'asc');
    }

    public static function getPages(): array
    {   

        return [
            'index' => Pages\ListMikrotiks::route('/'),
        ];
    }   


}