<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KritiksaranResource\Pages;
use App\Filament\Resources\KritiksaranResource\RelationManagers;
use App\Models\Kritiksaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KritiksaranResource extends Resource
{
    protected static ?string $model = Kritiksaran::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Kritik Saran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subjek')->required(),
                Forms\Components\TextInput::make('konten')->required(),
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
            'index' => Pages\ListKritiksarans::route('/'),
            'create' => Pages\CreateKritiksaran::route('/create'),
            'edit' => Pages\EditKritiksaran::route('/{record}/edit'),
        ];
    }
}
