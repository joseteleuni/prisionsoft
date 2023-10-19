<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrisionResource\Pages;
use App\Filament\Resources\PrisionResource\RelationManagers;
use App\Models\Prision;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

use App\Enums\Fo;
use App\Enums\Implementacion;
use App\Enums\Starlink;
use App\Enums\Vpn;

class PrisionResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationLabel = 'Configuracion penales';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuraciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                TextInput::make('nombre')->required(),
                TextInput::make('codigo')->required(),
                TextInput::make('did')->label('DID'),
                TextInput::make('num_gw')->label('Numero de GW')->numeric(),
                TextInput::make('num_tpe')->label('Numero de TPE')->numeric(),
                TextInput::make('ubicacion'),
                Select::make('implementacion')
                  ->options(Implementacion::class),
                Select::make('fo')
                  ->options(Fo::class)->label('Fibra optica'),
                Select::make('starlink')
                  ->options(Starlink::class),
                Select::make('vpn')->label('VPN')
                  ->options(Vpn::class),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre'),
                TextColumn::make('codigo')->label('Codigo'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrisions::route('/'),
            'create' => Pages\CreatePrision::route('/create'),
            'edit' => Pages\EditPrision::route('/{record}/edit'),
        ];
    }    
}
