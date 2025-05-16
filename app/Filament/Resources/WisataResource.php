<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WisataResource\Pages;
use App\Filament\Resources\WisataResource\RelationManagers;
use App\Models\Wisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class WisataResource extends Resource
{
    protected static ?string $model = Wisata::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Wisata';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\TextInput::make('slug')->required(),
            Forms\Components\Textarea::make('deskripsi')->required(),
            Forms\Components\TextInput::make('harga')->required()->numeric(),
            Forms\Components\TextInput::make('lokasi')->required(),
            Forms\Components\FileUpload::make('gambar')
                ->image()
                ->directory('wisata-images')
                ->visibility('public')
                ->required(),

            Forms\Components\Select::make('id_kategori')
                ->label('Kategori')
                ->relationship('kategori', 'nama') 
                ->required(),
            
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')->label('Nama'),
            Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi')
                ->label('Deskrispi')
                ->wrap()
                ->limit(50),
            Tables\Columns\TextColumn::make('slug')->label('Slug'),
            Tables\Columns\TextColumn::make('lokasi')
                ->label('Lokasi')
                ->wrap()
                ->limit(50),
            Tables\Columns\TextColumn::make('harga')->label('Harga'),
            Tables\Columns\ImageColumn::make('gambar')
                ->label('Gambar')
                ->disk('public') 
                ->height(60),
            Tables\Columns\TextColumn::make('kategori.nama')->label('Kategori'),
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
            'index' => Pages\ListWisatas::route('/'),
            'create' => Pages\CreateWisata::route('/create'),
            'edit' => Pages\EditWisata::route('/{record}/edit'),
        ];
    }
}
