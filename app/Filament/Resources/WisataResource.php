<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WisataResource\Pages;
use App\Models\Wisata;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
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

    private static function geocodeAndSet(string $address, callable $set): void
    {
        $response = Http::get("https://api.opencagedata.com/geocode/v1/json", [
            'q'           => $address . ', Bukittinggi',
            'key'         => config('services.opencage.key'),
            'limit'       => 1,
            'countrycode' => 'id',
        ]);

        $data = $response->json();

        if (!empty($data['results'][0]['geometry'])) {
            $set('latitude',  $data['results'][0]['geometry']['lat']);
            $set('longitude', $data['results'][0]['geometry']['lng']);
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->required()
                    ->label('Kata Kunci')
                    ->readOnly(),

                Textarea::make('deskripsi')->required(),

                // Toggle gratis + field harga
                Toggle::make('is_gratis')
                    ->label('Gratis')
                    ->default(false)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) $set('harga', 0);
                    }),

                TextInput::make('harga')
                    ->numeric()
                    ->inputMode('decimal')
                    ->default(0)
                    ->hidden(fn ($get) => $get('is_gratis'))
                    ->required(fn ($get) => !$get('is_gratis')),

                TextInput::make('lokasi')
                    ->required()
                    ->lazy()
                    ->afterStateHydrated(function ($state, callable $set, $get) {
                        if ($state && !$get('latitude') && !$get('longitude')) {
                            self::geocodeAndSet($state, $set);
                        }
                    })
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (!$state) return;
                        self::geocodeAndSet($state, $set);
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
                    ->readOnly(),

                TextInput::make('longitude')
                    ->required()
                    ->readOnly(),

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
                TextColumn::make('kategori.nama')->label('Kategori'),
                TextColumn::make('harga')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => $state == 0 ? 'Gratis' : 'Rp' . number_format($state, 0, ',', '.')),
                TextColumn::make('lokasi')->limit(30)->toggleable(),
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->square()
                    ->size(60),
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
            'index'  => Pages\ListWisatas::route('/'),
            'create' => Pages\CreateWisata::route('/create'),
            'edit'   => Pages\EditWisata::route('/{record}/edit'),
        ];
    }
}