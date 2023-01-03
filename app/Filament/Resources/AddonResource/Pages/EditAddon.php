<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAddon extends EditRecord
{
    protected static string $resource = AddonResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AddonResource\Widgets\AddonDownloads::class,
            AddonResource\Widgets\AddonRating::class,
        ];
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'Add-on updated';
    }
}
