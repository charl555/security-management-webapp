<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentPhotoResource\Pages;
use App\Filament\Resources\ResidentPhotoResource\RelationManagers;
use App\Models\resident_photo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ResidentPhotoResource extends Resource
{
    protected static ?string $model = resident_photo::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationGroup = 'Residents';
    protected static ?string $modelLabel = 'Resident Photos';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['resident', 'resident.address']);
    }


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
                TextColumn::make('resident.resident_information_id')->label('Resident ID'),
                TextColumn::make('resident.first_name')->label('Resident Name'),
                TextColumn::make('resident.middle_name')->label('Middle Name'),
                TextColumn::make('resident.last_name')->label('Last Name'),
                ImageColumn::make('resident_photo'),
                TextColumn::make('resident.address.home_address')->label('Home Address'),
                TextColumn::make('resident.address.street_name')->label('Street Name'),
                TextColumn::make('resident.address.phase_number')->label('Phase Number'),
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
            'index' => Pages\ListResidentPhotos::route('/'),
            'create' => Pages\CreateResidentPhoto::route('/create'),
            'edit' => Pages\EditResidentPhoto::route('/{record}/edit'),
        ];
    }
}
