<?php

namespace App\Filament\Resources\SenbudResource\Pages;

use App\Filament\Resources\SenbudResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSenbud extends EditRecord
{
    protected static string $resource = SenbudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
