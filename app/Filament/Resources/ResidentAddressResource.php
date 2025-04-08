<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentAddressResource\Pages;
use App\Filament\Resources\ResidentAddressResource\RelationManagers;
use App\Models\resident_address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResidentAddressResource extends Resource
{
    protected static ?string $model = resident_address::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $modelLabel = 'Resident Addresses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('resident_information_id'),
                TextColumn::make('home_address'),
                TextColumn::make('street_name'),
                TextColumn::make('phase_number'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResidentAddresses::route('/'),
            'create' => Pages\CreateResidentAddress::route('/create'),
            'edit' => Pages\EditResidentAddress::route('/{record}/edit'),
        ];
    }
}
