<?php

namespace App\Filament\Resources\ResidentInformationResource\Pages;

use App\Filament\Resources\ResidentInformationResource;
use Filament\Actions;
use Livewire\WithFileUploads;
use Filament\Resources\Pages\CreateRecord;
use App\Models\resident_information;
use Illuminate\Support\Arr;

class CreateResidentInformation extends CreateRecord
{
    use WithFileUploads;

    protected static string $resource = ResidentInformationResource::class;
    protected function handleRecordCreation(array $data): resident_information
    {
        
        $addressData = Arr::only($data, ['home_address','street_name','phase_number']);
        $photoFile   = $data['resident_photo'] ?? null;
    
       
        $residentData = Arr::except($data, array_merge(
            array_keys($addressData),
            ['resident_photo'],
        ));
    
       
        $resident = resident_information::create($residentData);


        $resident->address()->create($addressData);
    
        
        if ($photoFile) {
            $path = $photoFile->store('photos', 'public');
            $resident->photo()->create([
                'resident_photo' => $path,
            ]);
        }
    
        return $resident;
    }
    

}

