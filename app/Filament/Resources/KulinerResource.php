<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KulinerResource\Pages;
use App\Filament\Resources\KulinerResource\RelationManagers;
use App\Models\Kuliner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class KulinerResource extends Resource
{
    protected static ?string $model = Kuliner::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Kuliner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\TextInput::make('deskripsi')->required(),
                FileUpload::make('gambar'),
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
            'index' => Pages\ListKuliners::route('/'),
            'create' => Pages\CreateKuliner::route('/create'),
            'edit' => Pages\EditKuliner::route('/{record}/edit'),
        ];
    }
}
