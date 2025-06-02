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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class KulinerResource extends Resource
{
    protected static ?string $model = Kuliner::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationIcon = 'heroicon-c-building-storefront';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\TextInput::make('deskripsi')->required(),
                Forms\Components\FileUpload::make('gambar')
                ->image()
                ->disk('public')
                ->directory('wisata-images')
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
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->wrap()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->url(fn ($record) => asset('storage/' . $record->gambar)), 
                Tables\Columns\TextColumn::make('kategori.nama') 
                    ->label('Kategori'),
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
