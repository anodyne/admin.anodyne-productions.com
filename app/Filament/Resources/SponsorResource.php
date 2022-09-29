<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages;
use App\Models\Sponsor;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'flex-cash-bag-share';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 20;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->placeholder('Select a user'),
                Forms\Components\TextInput::make('name')->label('Display name'),
                Forms\Components\Select::make('tier')
                    ->options([
                        'backer' => 'Backer',
                        'sponsor' => 'Sponsor',
                        'silver' => 'Silver Sponsor',
                        'gold' => 'Gold Sponsor',
                        'platinum' => 'Platinum Sponsor',
                    ])
                    ->label('Sponsorship Tier')
                    ->reactive(),
                Forms\Components\Toggle::make('active')->columnSpan(2),
                Forms\Components\Fieldset::make('Gold / Platinum Perks')
                    ->schema([
                        Forms\Components\TextInput::make('link'),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('logo')->collection('logo'),
                    ])
                    ->hidden(fn (Closure $get) => ! in_array($get('tier'), ['gold', 'platinum'])),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->description(fn (Sponsor $record) => $record->user?->name)
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('tier')
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                Tables\Columns\BooleanColumn::make('active')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active'),
                Tables\Filters\SelectFilter::make('tier')
                    ->options([
                        'backer' => 'Backer',
                        'sponsor' => 'Sponsor',
                        'silver' => 'Silver Sponsor',
                        'gold' => 'Gold Sponsor',
                        'platinum' => 'Platinum Sponsor',
                    ])
                    ->label('Sponsorship tier'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationMessage('Sponsor deleted'),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}
