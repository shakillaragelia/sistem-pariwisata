<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WisataResource\Pages;
use App\Models\Wisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Toggle;


class WisataResource extends Resource
{
    protected static ?string $model = Wisata::class;

    protected static ?string $navigationGroup = 'Data Pariwisata';

    protected static ?string $navigationLabel = 'Wisata';
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                TextInput::make('slug')->required(),
                Textarea::make('deskripsi')->required(),

                TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->inputMode('decimal'),

                TextInput::make('lokasi')
                    ->required()
                    ->reactive()
                    ->afterStateHydrated(function ($state, callable $set, $get) {
                        if ($state && !$get('latitude') && !$get('longitude')) {
                            $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
                                'address' => $state,
                                'key' => config('services.google_maps.key'),
                            ]);

                            $data = $response->json();

                            if (!empty($data['results'][0]['geometry']['location'])) {
                                $location = $data['results'][0]['geometry']['location'];
                                $set('latitude', $location['lat']);
                                $set('longitude', $location['lng']);
                            }
                        }
                    })
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (!$state) return;

                        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
                            'address' => $state,
                            'key' => config('services.google_maps.key'),
                        ]);

                        $data = $response->json();

                        if (!empty($data['results'][0]['geometry']['location'])) {
                            $location = $data['results'][0]['geometry']['location'];
                            $set('latitude', $location['lat']);
                            $set('longitude', $location['lng']);
                        }
                    }),

                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('wisata-images')
                    ->required(),

                Select::make('id_kategori')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama')
                    ->required(),

                TextInput::make('latitude')
                    ->required()
                    ->reactive()
                    ->extraAttributes(['readonly' => true]),

                TextInput::make('longitude')
                    ->required()
                    ->reactive()
                    ->extraAttributes(['readonly' => true]),

                    Toggle::make('toilet')->label('Toilet'),
                    Toggle::make('parkir')->label('Parkir'),
                    Toggle::make('tempat_ibadah')->label('Tempat Ibadah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('deskripsi')->limit(50)->wrap()->toggleable(),
                TextColumn::make('slug'),
                TextColumn::make('lokasi')->limit(50)->wrap()->toggleable(),
                TextColumn::make('harga')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'IDR ' . number_format($state, 0, ',', '.')),
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->url(fn ($record) => asset('storage/' . $record->gambar)),
                TextColumn::make('kategori.nama')->label('Kategori'),
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
        return [];
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
