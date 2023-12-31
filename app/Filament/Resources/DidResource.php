<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DidResource\Pages;
use App\Filament\Resources\DidResource\RelationManagers;
use App\Models\Did;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class DidResource extends Resource
{
    protected static ?string $model = Did::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuraciones';

    protected static ?string $navigationLabel = 'Configuracion DIDs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('prision_id')
                    ->relationship('prision', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('nombre')->label('Numero DID')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('comentario')->label('Puerto GW'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('prision.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comentario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                SelectFilter::make('prision')
                  ->relationship('prision', 'nombre')
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDids::route('/'),
            'create' => Pages\CreateDid::route('/create'),
            'edit' => Pages\EditDid::route('/{record}/edit'),
        ];
    }    
}
