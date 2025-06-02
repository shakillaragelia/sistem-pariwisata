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
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;



class KomentarResource extends Resource
{
    protected static ?string $model = Komentar::class;

    protected static ?string $navigationGroup = 'Data Pariwisata';

    protected static ?string $navigationLabel = 'Komentar';
    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left';

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
                    ->relationship('user', 'name') 
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
        
                    Tables\Columns\TextColumn::make('commentable.nama')
                        ->label('Nama Wisata')
                        ->sortable()
                        ->searchable(),
                    
                    Tables\Columns\TextColumn::make('created_at')
                        ->label('Dibuat')
                        ->dateTime(),

                    Tables\Columns\TextColumn::make('commentable_type')
                        ->label('Tipe Objek')
                        ->formatStateUsing(fn ($state) => class_basename($state)),
        
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

