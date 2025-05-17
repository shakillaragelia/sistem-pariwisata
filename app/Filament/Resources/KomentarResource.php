<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KomentarResource\Pages;
use App\Filament\Resources\KomentarResource\RelationManagers;
use App\Models\Komentar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomentarResource extends Resource
{
    protected static ?string $model = Komentar::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Komentar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('komentar')->required(),
                Forms\Components\Select::make('id_wisata')
                    ->label('Wisata')
                    ->relationship('wisata', 'nama')
                    ->required(),
                Forms\Components\Select::make('id_user')
                    ->label('User')
                    ->relationship('user', 'name') // Pastikan relasi di model Komentar sudah benar
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    Tables\Columns\TextColumn::make('komentar')
                        ->label('Isi Komentar')
                        ->limit(50),
        
                    Tables\Columns\TextColumn::make('user.name')
                        ->label('Nama User'),
        
                    Tables\Columns\TextColumn::make('wisata.nama')
                        ->label('Nama Wisata'),
        
                    Tables\Columns\TextColumn::make('created_at')
                        ->label('Dibuat')
                        ->dateTime(),
        
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
            'index' => Pages\ListKomentars::route('/'),
            'create' => Pages\CreateKomentar::route('/create'),
            'edit' => Pages\EditKomentar::route('/{record}/edit'),
        ];
    }
}
