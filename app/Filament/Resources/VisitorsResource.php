<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorsResource\Pages;
use App\Filament\Resources\VisitorsResource\RelationManagers;
use App\Models\visitors;
use App\View\Components\CameraCapture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorsResource extends Resource
{
    protected static ?string $model = visitors::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Visitor Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()
            ->columns(2)
            ->description('Input Visitor\'s personal information.')
            ->schema([
                Group::make()->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('middle_name'),
                TextInput::make('last_name')->required(),
                TextInput::make('phone_number')->rules('min:11|max:11')->numeric()->required(), 
                ]),
                CameraCapture::make('visitor_photo')->required(),    
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListVisitors::route('/'),
            'create' => Pages\CreateVisitors::route('/create'),
            'edit' => Pages\EditVisitors::route('/{record}/edit'),
        ];
    }
}
