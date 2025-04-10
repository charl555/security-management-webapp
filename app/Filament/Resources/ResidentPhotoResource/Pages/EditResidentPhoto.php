<?php

namespace App\Filament\Resources\ResidentPhotoResource\Pages;

use App\Filament\Resources\ResidentPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResidentPhoto extends EditRecord
{
    protected static string $resource = ResidentPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
