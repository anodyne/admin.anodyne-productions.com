<?php

namespace App\Filament\Resources;

use App\Enums\ReleaseSeverity;
use App\Filament\Resources\ReleaseResource\Pages;
use App\Models\Release;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class ReleaseResource extends Resource
{
    protected static ?string $model = Release::class;

    protected static ?string $navigationIcon = 'flex-cloud-wifi';

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')->required()->columnSpanFull(),
                Forms\Components\DatePicker::make('date')
                    ->nullable()
                    ->weekStartsOnSunday()
                    ->columnSpan(1),
                Forms\Components\Select::make('severity')
                    ->options(
                        collect(ReleaseSeverity::cases())->flatMap(fn ($severity) => [$severity->value => $severity->displayName()])
                    )
                    ->columnSpan(1),
                Forms\Components\MarkdownEditor::make('notes')->columnSpanFull(),
                Forms\Components\TextInput::make('link')
                    ->default('https://anodyne-productions.com/nova')
                    ->columnSpan(1),
                Forms\Components\TextInput::make('upgrade_guide_link')->columnSpan(1),
                Forms\Components\Toggle::make('published')->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->searchable()
                    ->size('lg')
                    ->weight('bold')
                    ->alignLeft()
                    ->sortable()
                    ->icon(fn (Model $record) => $record->pendingRelease ? 'flex-alert-diamond' : '')
                    ->iconPosition('after')
                    ->color(fn (Model $record) => $record->pendingRelease ? 'danger' : ''),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->label('Release date')
                    ->alignLeft()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('severity')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->colors([
                        'danger' => static fn ($state): bool => $state === 'critical' || $state === 'security',
                        'primary' => 'minor',
                        'success' => 'major',
                    ]),
                Tables\Columns\TextColumn::make('games_count')
                    ->counts('games')
                    ->alignLeft()
                    ->label('# of games'),
                Tables\Columns\ToggleColumn::make('published'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('severity')->options(
                    collect(ReleaseSeverity::cases())->flatMap(fn ($severity) => [$severity->value => $severity->displayName()])
                ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary'),
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary')
                    ->successNotificationTitle('Release updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release deleted'),
            ])
            ->bulkActions([])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageReleases::route('/'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::hasPendingRelease()->count();
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return static::getNavigationBadge() > 0 ? 'danger' : 'secondary';
    }
}
