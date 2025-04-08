<?php

namespace App\Filament\Resources\ResidentAddressResource\Pages;

use App\Filament\Resources\ResidentAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResidentAddress extends EditRecord
{
    protected static string $resource = ResidentAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
