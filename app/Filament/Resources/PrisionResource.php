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

use App\Enums\Implementacion;
//use App\Enums\Starlink;
//use App\Enums\Vpn;
use App\Enums\Status;

class PrisionResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationLabel = 'Configuracion penales';

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Configuraciones';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                TextInput::make('nombre')->required(),
                TextInput::make('codigo')->required(),
                //TextInput::make('did')->label('DID'),
                TextInput::make('num_gw')->label('Numero de GW')->numeric(),
                TextInput::make('num_tpe')->label('Numero de TPE')->numeric(),
               // TextInput::make('ubicacion'),
                Select::make('departamento_id')
                  ->relationship('departamento', 'nombre')
                  ->required(),
                Select::make('implementacion')
                  ->options(Implementacion::class),
                Select::make('fo')
                  ->options(Status::class)->label('Fibra optica'),
                Select::make('starlink')
                  ->options(Status::class),
                Select::make('vpn')->label('VPN')
                  ->options(Status::class),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('codigo')->label('Codigo'),
                TextColumn::make('nombre'),
                

            ])
            ->defaultSort('codigo', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
                Tables\Actions\DeleteAction::make()->label('Borrar'),
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
            // RelationManagers\DepartamentosRelationManager::class,
            RelationManagers\DidsRelationManager::class
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
