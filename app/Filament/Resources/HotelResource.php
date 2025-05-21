<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelResource\Pages;
use App\Filament\Resources\HotelResource\RelationManagers;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;


class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Hotel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\TextInput::make('deskripsi')->required(),
                Forms\Components\TextInput::make('lokasi')->required(),
                FileUpload::make('gambar'),
                TextInput::make('bintang')
                ->label('Bintang')
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->required(),
                TextInput::make('latitude')->required(),
                TextInput::make('longitude')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nama')->label('Nama Hotel')->searchable(),
            TextColumn::make('lokasi')->label('Lokasi')->limit(30),
            TextColumn::make('deskripsi')->label('Deskripsi')->limit(30),
            TextColumn::make('bintang')->label('Bintang')->sortable(),
            Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->url(fn ($record) => asset('storage/' . $record->gambar)), 

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
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }
}
