<?php

namespace App\Filament\Resources\KulinerResource\Pages;

use App\Filament\Resources\KulinerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKuliner extends CreateRecord
{
    protected static string $resource = KulinerResource::class;

    protected static bool $canCreateAnother = false;
}
