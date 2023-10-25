<?php

namespace App\Filament\Resources\PrisionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;


class DidsRelationManager extends RelationManager
{
    protected static string $relationship = 'dids';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->label('Numero DID')
                    ->required()
                    ->maxLength(10),
                TextInput::make('comentario')->label('Puerto GW'),
        
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
