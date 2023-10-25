<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Models\Prision;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Resources\PrisionResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\PrisionResource\RelationManagers;

class CentralResource extends Resource
{
    protected static ?string $model = Prision::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationLabel = 'Centrales';

    protected static ?string $navigationGroup = 'Reportes';    
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('codigo')->searchable(),
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('num_gw')->label('Numero de GWs')->searchable(),
                TextColumn::make('num_tpe')->label('Numero de TPE')->searchable(),
                //TextColumn::make('dominio')->label('Dominio')->searchable(),
                TextColumn::make('departamento.nombre')->label('Ubicacion')->searchable(),
                TextColumn::make('puerto_pbx')->label('Puerto SSH')->searchable(),
                
            ])
            ->defaultSort('codigo', 'asc')
            ->actions([
                Tables\Actions\EditAction::make()->label('Ver'),]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('codigo')->disabled(),
                TextInput::make('nombre')->disabled(),
                TextInput::make('num_gw')->label('Numero de GWs')->disabled(),
                TextInput::make('num_tpe')->label('Numero de TPE')->disabled(),
                Select::make('departamento_id')
                  ->relationship('departamento', 'nombre')->disabled(),
                TextInput::make('puerto_pbx')->disabled(),
                TextInput::make('puerto_portserver')->disabled(),
                TextInput::make('dominio')->disabled(),
                RichEditor::make('comentario'),


            ])
            ;
    }


    public static function getPages(): array
    {   

        return [
            'index' => Pages\ListCentrals::route('/'),
            //'edit' => Pages\EditPrision::route('/{record}/edit'),

        ];
    }
    
    public static function getRelations(): array
    {
        return [
            //
            // RelationManagers\DepartamentosRelationManager::class,
            RelationManagers\DidsRelationManager::class
        ];
    }

}