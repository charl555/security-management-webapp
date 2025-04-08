<?php

namespace App\Filament\Resources\ResidentInformationResource\Pages;

use App\Filament\Resources\ResidentInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\resident_information;
use Illuminate\Support\Arr;


class CreateResidentInformation extends CreateRecord
{
    protected static string $resource = ResidentInformationResource::class;

    protected function handleRecordCreation(array $data): resident_information
    {
        
        $addressData = Arr::only($data, [
            'home_address',
            'street_name',
            'phase_number',
        ]);

        
        $residentData = Arr::except($data, array_keys($addressData));

        
        $resident = resident_information::create($residentData);

        
        $resident->address()->create($addressData);

        return $resident;
    }
}
