<?php

namespace App\View\Components;

use Filament\Forms\Components\Field;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CameraCapture extends Field
{
    protected string $view = 'components.camera-capture';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (CameraCapture $component, $state) {
            if ($state instanceof TemporaryUploadedFile) {
                $component->statePath($state->getRealPath());
            }
        });

        $this->dehydrated(fn ($state) => filled($state));
        $this->nullable();
    }
}
