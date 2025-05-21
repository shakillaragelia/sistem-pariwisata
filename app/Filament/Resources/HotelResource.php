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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

function getCoordinates($address)
{
    $apiKey = env('GOOGLE_MAPS_API_KEY');
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=$apiKey";
    $response = Http::get($url);
    $data = $response->json();

    if (!empty($data['results'][0])) {
        $location = $data['results'][0]['geometry']['location'];
        return [
            'latitude' => $location['lat'],
            'longitude' => $location['lng'],
        ];
    }

    return null;
}

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Hotel';

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        $coordinates = getCoordinates($data['lokasi']);
        if ($coordinates) {
            $data['latitude'] = $coordinates['latitude'];
            $data['longitude'] = $coordinates['longitude'];
        }
        return $data;
    }

    protected static function mutateFormDataBeforeUpdate(array $data): array
    {
        $coordinates = getCoordinates($data['lokasi']);
        if ($coordinates) {
            $data['latitude'] = $coordinates['latitude'];
            $data['longitude'] = $coordinates['longitude'];
        }
        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                TextInput::make('slug')->required(),
                TextInput::make('deskripsi')->required(),
                TextInput::make('lokasi')->required(),
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
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->url(fn ($record) => asset('storage/' . $record->gambar)),
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
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }
}
