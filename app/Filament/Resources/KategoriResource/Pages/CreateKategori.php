<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255),
        ];
    }
}
