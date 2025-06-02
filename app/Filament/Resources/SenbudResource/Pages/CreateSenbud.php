<?php

namespace App\Filament\Resources\SenbudResource\Pages;

use App\Filament\Resources\SenbudResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSenbud extends CreateRecord
{
    protected static string $resource = SenbudResource::class;

    protected static bool $canCreateAnother = false;
}
