<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelResource\Pages;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationGroup = 'Data Pariwisata';

    protected static ?string $navigationLabel = 'Hotel';
    protected static ?string $navigationIcon = 'heroicon-s-building-office-2';

    private static function geocodeAndSet(string $address, callable $set): void
    {

        $response = Http::withHeaders([
            'User-Agent' => 'SistemPariwisata/1.0'
        ])->get("https://nominatim.openstreetmap.org/search", [
            'q'      => $address, 
            'format' => 'json',
            'limit'  => 1,
        ]);

        $data = $response->json();

        if (empty($data[0])) {
             $response = Http::withHeaders([
                'User-Agent' => 'SistemPariwisata/1.0'
            ])->get("https://nominatim.openstreetmap.org/search", [
                'q'      => $address . ', Bukittinggi',
                'format' => 'json',
                'limit'  => 1,
            ]);
            $data = $response->json();
        }

        if (!empty($data[0])) {
            $set('latitude',  $data[0]['lat']);
            $set('longitude', $data[0]['lon']);
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

                TextInput::make('deskripsi')->required(),

                TextInput::make('lokasi')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (!$state) return;
                        self::geocodeAndSet($state, $set);
                    }),

                FileUpload::make('gambar')
    ->image()
    ->multiple()
    ->reorderable()
    ->maxFiles(5)
    ->disk('public')
    ->directory('hotel-images')
    ->required(),


                TextInput::make('bintang')
                    ->label('Bintang')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->required(),

                TextInput::make('latitude')
                    ->required()
                    ->readOnly(),

                TextInput::make('longitude')
                    ->required()
                    ->readOnly(),

                TextInput::make('harga_mulai')
                    ->label('Harga Mulai Dari')
                    ->numeric()
                    ->nullable(),

                TextInput::make('harga_max')
                    ->label('Harga Tertinggi')
                    ->numeric()
                    ->nullable(),

                TextInput::make('telepon')
                    ->label('No. Telepon')
                    ->tel()
                    ->nullable(),
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
                ImageColumn::make('gambar')
                ->label('Gambar')
                ->disk('public')
                ->visibility('public')
                ->square()
                ->size(60)
                ->stacked(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit'   => Pages\EditHotel::route('/{record}/edit'),
        ];
    }
}