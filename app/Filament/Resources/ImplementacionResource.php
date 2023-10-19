<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Models\Prision;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\PrisionResource\Pages;

use Filament\Tables\Filters\SelectFilter;

class ImplementacionResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Implementacion';

    protected static ?string $navigationGroup = 'Reportes';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('starlink')->searchable(),
                TextColumn::make('fo')->label('Fibra Optica')->searchable(),
                TextColumn::make('implementacion')->searchable(),
                TextColumn::make('vpn')->label('VPN')->searchable(),

            ])
            ->filters([
                //
                SelectFilter::make('starlink')
                ->options([
                    'ok' => 'OK',
                    'nok' => 'NOK',
                ]),
                SelectFilter::make('fo')->label('Fibra Optica')
                ->options([
                    'ok' => 'OK',
                    'nok' => 'NOK',
                ]),
                SelectFilter::make('implementacion')
                ->multiple()
                ->options([
                    'directo' => 'DIRECTO',
                    'dni-pin' => 'DNI-PIN',
                    'saldo'   => 'SALDO'
                 ]),
            ]);
    }

    public static function getPages(): array
    {   

        return [
            'index' => Pages\ListImplementacions::route('/'),
        ];
    }    
}
