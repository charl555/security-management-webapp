<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentAddressResource\Pages;
use App\Filament\Resources\ResidentAddressResource\RelationManagers;
use App\Models\resident_address;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\resident_information;

class ResidentAddressResource extends Resource
{
    protected static ?string $model = resident_address::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'Residents';
    protected static ?string $modelLabel = 'Resident Address';

    public static function form(Form $form): Form
    {
        return $form

        ->schema([
            
            Section::make('Resident Info')->columnSpan(1)
            ->schema([
                Select::make('resident_information_id')
                            ->label('Resident ID')
                            ->options(
                                resident_information::query()
                                    ->pluck('resident_information_id','resident_information_id')
                                    ->toArray()
                            )
                            ->reactive()                                    // 1) make it reactive
                            ->afterStateUpdated(function ($state, callable $set) {
                                // 2) when user picks an ID, look up that resident...
                                $resident = resident_information::find($state);
                                if (! $resident) {
                                    $set('first_name', null);
                                    $set('middle_name', null);
                                    $set('last_name', null);
                                    return;
                                }
                                // 3) and prefill the name fields
                                $set('first_name', $resident->first_name);
                                $set('middle_name', $resident->middle_name);
                                $set('last_name', $resident->last_name);
                            })
                            ->required(),

                TextInput::make('first_name')->disabled(),
                TextInput::make('middle_name')->disabled(),
                TextInput::make('last_name')->disabled(),
            ]),

            Section::make('Address')->columns(columns: 1)->columnSpan(1)
            ->schema([
                TextInput::make('home_address'),
                TextInput::make('street_name'),
                Select::make('phase_number')->options([
                    '1' => '1', '2' => '2', '3' => '3',
                ]),
            ]),




        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('resident_information_id')->label('Resident ID'),
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
