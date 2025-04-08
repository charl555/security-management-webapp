<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentInformationResource\Pages;
use App\Filament\Resources\ResidentInformationResource\RelationManagers;
use App\Models\resident_information;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResidentInformationResource extends Resource
{
    protected static ?string $model = resident_information::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'Resident Info';

    public static function form(Form $form): Form
    {
        return $form

        ->schema([

            Section::make('Personal Info')->columns(2)
            ->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('middle_name')->nullable(),
                TextInput::make('last_name')->required(),
                TextInput::make('email')->email(),
                TextInput::make( 'phone_number')->numeric(),
                Select::make('gender')->options(['Male' => 'Male', 'Female' => 'Female', 'Other'=> 'Other'])->required(),
                DatePicker::make('date_of_birth'),
                TextInput::make('place_of_birth')->required(),
                TextInput::make('occupation')->required(),    
            ]),

            Section::make('Address')->columns(2)
            ->schema([
                TextInput::make('home_address')->required(),
                TextInput::make('street_name')->required(),
                TextInput::make('phase_number')->required()->numeric(),
            ]),

        ]);

            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn ::make('resident_information_id')->label('ID'),
                TextColumn::make('first_name'),
                TextColumn::make('middle_name'),
                TextColumn::make('last_name'),
                TextColumn::make('email'),
                TextColumn::make('phone_number'),
                TextColumn::make('gender'),
                TextColumn::make('date_of_birth'),
                TextColumn::make('place_of_birth'),
                TextColumn::make('occupation'),

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
            'index' => Pages\ListResidentInformation::route('/'),
            'create' => Pages\CreateResidentInformation::route('/create'),
            'edit' => Pages\EditResidentInformation::route('/{record}/edit'),
        ];
    }
}
