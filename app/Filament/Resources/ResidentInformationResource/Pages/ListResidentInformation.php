<?php

namespace App\Filament\Resources\ResidentInformationResource\Pages;

use App\Filament\Resources\ResidentInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResidentInformation extends ListRecords
{
    protected static string $resource = ResidentInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
