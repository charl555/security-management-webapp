<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{

    // protected static string $routePath = '/';

    // protected static string $view = 'filament-panels::pages.dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    // public function getColumns(): int | string | array
    // {
    //     return 4;
    // }

    public function getTitle(): string | Htmlable
    {
        return 'Dashboard';
    }
}