<?php

namespace App\Filament\Resources\VersionResource\Pages;

use App\Filament\Resources\VersionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVersion extends ViewRecord
{
    protected static string $resource = VersionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
