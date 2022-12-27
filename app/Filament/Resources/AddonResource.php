<?php

namespace App\Filament\Resources;

use App\Enums\AddonType;
use App\Filament\Resources\AddonResource\Pages;
use App\Filament\Resources\AddonResource\RelationManagers;
use App\Models\Addon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AddonResource extends Resource
{
    protected static ?string $model = Addon::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'add-on';

    protected static ?string $navigationIcon = 'flex-application-add';

    protected static ?string $navigationGroup = 'Exchange';

    protected static ?string $navigationLabel = 'Add-Ons';

    protected static ?string $pluralModelLabel = 'add-ons';

    protected static ?string $breadcrumb = 'Add-Ons';

    public static function form(Form $form): Form
    {
        return $form->schema(
            [
                Forms\Components\Card::make()->schema(
                    self::getFormSchema()
                )
                ->columns(1)
                ->columnSpan('full'),

                Forms\Components\Card::make()->schema(
                    self::getFormSchema('previews')
                )
                ->columns(1)
                ->columnSpan('full'),
            ]
        );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('type')
                    ->enum(
                        collect(AddonType::cases())
                            ->flatMap(fn ($case) => [$case->value => $case->displayName()])
                            ->all()
                    )
                    ->colors([
                        'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-400' => AddonType::extension->value,
                        'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-400' => AddonType::theme->value,
                        // 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-400' => AddonType::genre->value,
                        'bg-amber-100 dark:bg-amber-900 text-amber-700 dark:text-amber-400' => AddonType::rank->value,
                    ]),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('downloads_count')
                    ->counts('downloads')
                    ->label('# of Downloads'),
                Tables\Columns\TextColumn::make('rating')->sortable(),
                Tables\Columns\ToggleColumn::make('published'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'theme' => 'Skin',
                        'extension' => 'MOD',
                        'rank' => 'Rank Set',
                    ]),
                Tables\Filters\SelectFilter::make('author')
                    ->relationship('user', 'name')
                    ->hidden(fn () => auth()->user()->isUser),
                Tables\Filters\TernaryFilter::make('published'),
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
                    ->color('secondary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationMessage('Add-on deleted'),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VersionsRelationManager::class,
            RelationManagers\QuestionsRelationManager::class,
            RelationManagers\ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddons::route('/'),
            'create' => Pages\CreateAddon::route('/create'),
            'view' => Pages\ViewAddon::route('/{record}'),
            'edit' => Pages\EditAddon::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(auth()->user()->isUser, fn ($query) => $query->where('user_id', auth()->id()));
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No add-ons found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Create your first add-on to share with the community.';
    }

    public static function getFormSchema(?string $section = null): array
    {
        if ($section === 'versions') {
            return [
                Forms\Components\Repeater::make('versions')
                    ->relationship()
                    ->label('')
                    ->maxItems(1)
                    ->columnSpan('full')
                    ->disableItemDeletion()
                    ->disableItemMovement()
                    ->columns(4)
                    ->schema([
                        Forms\Components\TextInput::make('version')
                            ->required()
                            ->columnSpan(2),

                        Forms\Components\Select::make('product')
                            ->required()
                            ->multiple()
                            ->placeholder('Select product')
                            ->relationship('product', 'name', fn (Builder $query) => $query->published())
                            ->preload()
                            ->maxItems(1)
                            ->columnSpan(2),

                        Forms\Components\MarkdownEditor::make('release_notes')
                            ->columnSpan('full'),

                        Forms\Components\MarkdownEditor::make('upgrade_instructions')
                            ->columnSpan('full'),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('filename')
                            ->required()
                            ->collection('downloads')
                            ->columnSpan('full'),

                        Forms\Components\Toggle::make('published')
                            ->default(true)
                            ->columnSpan(2),
                    ]),
            ];
        }

        if ($section === 'previews') {
            return [
                Forms\Components\Group::make([
                    Forms\Components\SpatieMediaLibraryFileUpload::make('previews')
                        ->label('Preview image(s)')
                        ->helperText('Upload up to 5 screenshots for your add-on to give users a preview of what they can expect')
                        ->maxFiles(5)
                        ->collection('previews')
                        ->columnSpan('full'),
                ])
                ->columns(3)
                ->columnSpan('full'),
            ];
        }

        return [
            Forms\Components\Group::make([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpan(1),

                Forms\Components\Select::make('type')
                    ->placeholder('Select a type')
                    ->required()
                    ->options(
                        collect(AddonType::cases())
                            ->flatMap(fn ($case) => [$case->value => $case->displayName()])
                            ->all()
                    )
                    ->columnSpan(1),

                Forms\Components\Select::make('products')
                    ->label('Product(s)')
                    ->required()
                    ->multiple()
                    ->placeholder('Select product(s)')
                    ->relationship('products', 'name', fn (Builder $query) => $query->published())
                    ->preload()
                    ->columnSpan(1),

                Forms\Components\MarkdownEditor::make('description')
                    ->columnSpan('full'),

                Forms\Components\Toggle::make('published')
                    ->helperText('Only published add-ons will be available for download')
                    ->default(false)
                    ->columnSpan('full'),
            ])
            ->columns(3)
            ->columnSpan('full'),
        ];
    }
}
