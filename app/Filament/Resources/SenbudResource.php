<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SenbudResource\Pages;
use App\Filament\Resources\SenbudResource\RelationManagers;
use App\Models\Senbud;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SenbudResource extends Resource
{
    protected static ?string $model = Senbud::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Seni Budaya';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSenbuds::route('/'),
            'create' => Pages\CreateSenbud::route('/create'),
            'edit' => Pages\EditSenbud::route('/{record}/edit'),
        ];
    }
}
