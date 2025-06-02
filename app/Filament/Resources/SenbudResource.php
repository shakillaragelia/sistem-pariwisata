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
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;


class SenbudResource extends Resource
{
    protected static ?string $model = Senbud::class;

    protected static ?string $navigationGroup = 'Data Pariwisata';

    protected static ?string $navigationLabel = 'Seni Budaya';
    protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('slug')->required()->label('Kata Kunci') ,
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
                Tables\Columns\TextColumn::make('slug')->label('Kata Kunci') ,
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
            'index' => Pages\ListSenbuds::route('/'),
            'create' => Pages\CreateSenbud::route('/create'),
            'edit' => Pages\EditSenbud::route('/{record}/edit'),
        ];
    }
}
