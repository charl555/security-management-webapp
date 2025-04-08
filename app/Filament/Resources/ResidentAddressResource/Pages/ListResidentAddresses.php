<?php

namespace App\Filament\Resources\ResidentAddressResource\Pages;

use App\Filament\Resources\ResidentAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResidentAddresses extends ListRecords
{
    protected static string $resource = ResidentAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
