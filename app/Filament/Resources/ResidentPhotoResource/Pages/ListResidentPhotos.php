<?php

namespace App\Filament\Resources\ResidentPhotoResource\Pages;

use App\Filament\Resources\ResidentPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResidentPhotos extends ListRecords
{
    protected static string $resource = ResidentPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
