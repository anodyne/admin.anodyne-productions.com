<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Models\Product;
use App\Models\Version;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Contracts\HasRelationshipTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class VersionsRelationManager extends RelationManager
{
    protected static string $relationship = 'versions';

    protected static ?string $recordTitleAttribute = 'version';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')->required(),
                Forms\Components\Select::make('product')
                    ->required()
                    ->multiple()
                    ->placeholder('Select product')
                    ->relationship('product', 'name', fn (Builder $query) => $query->published())
                    ->preload()
                    ->maxItems(1),
                Forms\Components\MarkdownEditor::make('release_notes')->columnSpan('full'),
                Forms\Components\MarkdownEditor::make('upgrade_instructions')->columnSpan('full'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('filename')
                    ->columnSpan('full')
                    ->collection('downloads'),
                Forms\Components\Toggle::make('published')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->sortable()
                    ->description(
                        fn (Version $record): string => $record->getFirstMedia('downloads')?->name ?? ''
                    ),
                Tables\Columns\TextColumn::make('downloads_count')
                    ->counts('downloads')
                    ->label('Downloads'),
                Tables\Columns\TextColumn::make('product.name')->label('Product'),
                Tables\Columns\ToggleColumn::make('published'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->using(function (HasRelationshipTable $livewire, array $data) {
                        $record = $livewire->getRelationship()->create($data);

                        $record->product()->attach(Product::findOrFail($data['product']));

                        return $record;
                    })
                    ->successNotificationMessage('New add-on version created'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary')
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['product'] = data_get($data, 'product.0.id');

                        return $data;
                    })
                    ->using(function (Model $record, array $data): Model {
                        $record->update($data);

                        $record->product()->detach();

                        $record->product()->attach(Product::findOrFail($data['product']));

                        return $record;
                    })
                    ->successNotificationMessage('Add-on version updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationMessage('Add-on version deleted'),
            ])
            ->bulkActions([])
            ->defaultSort('version', 'desc');
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No versions found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Create a new version and upload a zip file.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-download';
    }

    protected function getTableQuery(): Builder | Relation
    {
        return parent::getTableQuery()->with('product');
    }
}
