<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use App\Forms\Components\Header;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CreateAddon extends CreateRecord
{
    use HasWizard;

    protected static string $resource = AddonResource::class;

    protected static ?string $title = 'Create Add-on';

    protected function getSteps(): array
    {
        return [
            Step::make('Add-on details')
                ->description('Provide some basic details about your add-on')
                ->schema([
                    Card::make(AddonResource::getFormSchema())
                        ->columns(1)
                        ->columnSpan('full'),
                ]),

            Step::make('Add-on files')
                ->description("Upload your add-on's files")
                ->schema([
                    Forms\Components\Group::make(AddonResource::getFormSchema('versions'))
                        ->columns(1)
                        ->columnSpan('full'),
                ]),
        ];
    }

    // protected function getFormSchema(): array
    // {
    //     return [
    //         Forms\Components\Group::make()->schema([
    //             Forms\Components\Card::make()
    //                 ->schema([
    //                     Forms\Components\TextInput::make('name')
    //                         ->required()
    //                         ->columnSpan(1),

    //                     Forms\Components\Select::make('type')
    //                         ->placeholder('Select a type')
    //                         ->options([
    //                             'theme' => 'Skin',
    //                             'extension' => 'MOD',
    //                         ])
    //                         ->hidden(fn () => ! auth()->user()->isUser)
    //                         ->columnSpan(1),
    //                     Forms\Components\Select::make('type')
    //                         ->placeholder('Select a type')
    //                         ->options([
    //                             'theme' => 'Skin',
    //                             'extension' => 'MOD',
    //                             'rank' => 'Rank',
    //                         ])
    //                         ->hidden(fn () => auth()->user()->isUser)
    //                         ->columnSpan(1),

    //                     Forms\Components\Select::make('products')
    //                         ->label('Product(s)')
    //                         ->multiple()
    //                         ->placeholder('Select product(s)')
    //                         ->relationship('products', 'name', fn (Builder $query) => $query->published())
    //                         ->preload()
    //                         ->columnSpan(1)
    //                         ->helperText('You can associate this add-on with any available products.'),

    //                     Forms\Components\MarkdownEditor::make('description')->columnSpan('full'),
    //                 ])
    //                 ->columns(2)
    //                 ->columnSpan(2),

    //             Forms\Components\Group::make()->schema([
    //                 Forms\Components\Section::make('Status')
    //                     ->schema([
    //                         Forms\Components\Toggle::make('published')
    //                             ->helperText('Only published add-ons will be available for download.')
    //                             ->default(false),

    //                         Forms\Components\DatePicker::make('published_at')
    //                             ->label('Availability')
    //                             ->default(now())
    //                             ->required(),
    //                     ]),
    //             ]),
    //         ])->columns(3),

    //         // Forms\Components\Card::make()
    //         //     ->columns(4)
    //         //     ->schema([
    //         //         Header::make('Add-on Info')
    //         //             ->description('Lorem ipsum dolor sit amet consectetur adipisicing elit quam corrupti consectetur.')
    //         //             ->columnSpan('full'),
    //         //         Forms\Components\Grid::make(4)
    //         //             ->schema([
    //         //                 Forms\Components\TextInput::make('name')
    //         //                     ->required()
    //         //                     ->columnSpan(2),
    //         //             ]),
    //         //         Forms\Components\Grid::make(4)
    //         //             ->schema([
    //         //                 Forms\Components\Select::make('type')
    //         //                     ->placeholder('Select a type')
    //         //                     ->options([
    //         //                         'theme' => 'Skin',
    //         //                         'extension' => 'MOD',
    //         //                     ])
    //         //                     ->hidden(fn () => ! auth()->user()->isUser)
    //         //                     ->columnSpan(2),
    //         //                 Forms\Components\Select::make('type')
    //         //                     ->placeholder('Select a type')
    //         //                     ->options([
    //         //                         'theme' => 'Skin',
    //         //                         'extension' => 'MOD',
    //         //                         'rank' => 'Rank',
    //         //                     ])
    //         //                     ->hidden(fn () => auth()->user()->isUser)
    //         //                     ->columnSpan(2),
    //         //             ]),
    //         //         Forms\Components\Grid::make(4)
    //         //             ->schema([
    //         //                 Forms\Components\Select::make('products')
    //         //                     ->label('Product(s)')
    //         //                     ->multiple()
    //         //                     ->placeholder('Select product(s)')
    //         //                     ->relationship('products', 'name', fn (Builder $query) => $query->published())
    //         //                     ->preload()
    //         //                     ->columnSpan(2)
    //         //                     ->helperText('You can associate this add-on with any available products.'),
    //         //             ]),
    //         //         Forms\Components\RichEditor::make('description')
    //         //             ->columnSpan(3),
    //         //         Forms\Components\Toggle::make('published')
    //         //             ->default(false)
    //         //             ->columnSpan(2)
    //         //             ->helperText('Only published add-ons will be available for download.'),
    //         //     ]),

    //         // Forms\Components\Repeater::make('versions')
    //         //     ->relationship()
    //         //     ->label('')
    //         //     ->maxItems(1)
    //         //     ->columnSpan('full')
    //         //     ->disableItemDeletion()
    //         //     ->disableItemMovement()
    //         //     ->columns(4)
    //         //     ->schema([
    //         //         Header::make('Version Info')
    //         //             ->description('Lorem ipsum dolor sit amet consectetur adipisicing elit quam corrupti consectetur.')
    //         //             ->columnSpan('full'),
    //         //         Forms\Components\TextInput::make('version')
    //         //             ->required()
    //         //             ->columnSpan(2),
    //         //         Forms\Components\Select::make('product')
    //         //             ->label('Product')
    //         //             ->multiple()
    //         //             ->placeholder('Select product')
    //         //             ->relationship('product', 'name', fn (Builder $query) => $query->published())
    //         //             ->preload()
    //         //             ->maxItems(1)
    //         //             ->columnSpan(2)
    //         //             ->helperText('You can associate this version with any available product.'),
    //         //         Forms\Components\RichEditor::make('release_notes')->columnSpan('full'),
    //         //         Forms\Components\RichEditor::make('upgrade_instructions')->columnSpan('full'),
    //         //         Forms\Components\SpatieMediaLibraryFileUpload::make('filename')
    //         //             ->collection('downloads')
    //         //             ->columnSpan('full'),
    //         //         Forms\Components\Toggle::make('published')
    //         //             ->default(true)
    //         //             ->columnSpan(2),
    //         //     ]),
    //     ];
    // }
    // (): array
    // {
    //     return [
    //         Step::make('Basic info')
    //             ->description('Tell us about your add-on')
    //             ->icon('flex-application-add')
    //             ->schema([
    //                 Forms\Components\Card::make([
    //                     Forms\Components\Grid::make(4)->schema([
    //                         Forms\Components\TextInput::make('name')
    //                             ->required()
    //                             ->columnSpan(2),
    //                         Forms\Components\Select::make('type')
    //                             ->placeholder('Select a type')
    //                             ->options([
    //                                 'theme' => 'Skin',
    //                                 'extension' => 'MOD',
    //                             ])
    //                             ->hidden(fn () => ! auth()->user()->isUser)
    //                             ->columnSpan(2),
    //                         Forms\Components\Select::make('type')
    //                             ->placeholder('Select a type')
    //                             ->options([
    //                                 'theme' => 'Skin',
    //                                 'extension' => 'MOD',
    //                                 'rank' => 'Rank',
    //                             ])
    //                             ->hidden(fn () => auth()->user()->isUser)
    //                             ->columnSpan(2),
    //                         Forms\Components\RichEditor::make('description')->columnSpan('full'),
    //                         Forms\Components\Toggle::make('published')
    //                             ->default(false)
    //                             ->columnSpan(2),
    //                     ]),
    //                 ]),
    //             ]),
    //         Step::make('Product')
    //             ->description('What product(s) is this add-on for?')
    //             ->icon('flex-shipping-box')
    //             ->schema([
    //                 Forms\Components\Card::make([
    //                     Forms\Components\Grid::make(2)->schema([
    //                         Forms\Components\Select::make('products')
    //                             ->multiple()
    //                             ->placeholder('Select a product')
    //                             ->relationship('products', 'name', fn (Builder $query) => $query->published())
    //                             ->preload()
    //                             ->columnSpan(1)
    //                             ->helperText('You can associate this add-on with any available products.'),
    //                     ]),
    //                 ]),
    //             ]),
    //         Step::make('Version')
    //             ->description('Create a version for your add-on')
    //             ->icon('flex-cloud-upload')
    //             ->schema([
    //                 Forms\Components\Repeater::make('versions')
    //                     ->relationship()
    //                     ->label('')
    //                     ->maxItems(1)
    //                     ->columnSpan('full')
    //                     ->disableItemDeletion()
    //                     ->disableItemMovement()
    //                     ->grid(4)
    //                     ->schema([
    //                         Forms\Components\TextInput::make('version')
    //                             ->required()
    //                             ->columnSpan(2),
    //                         Forms\Components\Select::make('product')
    //                             ->relationship('product', 'name', fn (Builder $query) => $query->published())
    //                             ->placeholder('Select a product')
    //                             ->columnSpan(2),
    //                         Forms\Components\RichEditor::make('release_notes')->columnSpan('full'),
    //                         Forms\Components\RichEditor::make('upgrade_instructions')->columnSpan('full'),
    //                         Forms\Components\SpatieMediaLibraryFileUpload::make('filename')
    //                             ->collection('downloads')
    //                             ->columnSpan('full'),
    //                         Forms\Components\Toggle::make('published')
    //                             ->default(true)
    //                             ->columnSpan(2),
    //                     ]),
    //             ]),
    //     ];
    // }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Add-on created';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    // protected function handleRecordCreation(array $data): Model
    // {
    //     $addon = static::getModel()::create([
    //         'name' => data_get($data, 'name'),
    //         'type' => data_get($data, 'type'),
    //         'description' => data_get($data, 'description'),
    //         'published' => data_get($data, 'published'),
    //         'user_id' => auth()->id(),
    //     ]);

    //     $addon->products()->attach(data_get($data, 'product'));

    //     $version = $addon->versions()->create([
    //         'version' => data_get($data, 'version'),
    //         'release_notes' => data_get($data, 'release_notes'),
    //         'upgrade_instructions' => data_get($data, 'upgrade_instructions'),
    //         'published' => data_get($data, 'version_published'),
    //     ]);

    //     $version->product()->attach(data_get($data, 'version_product'));

    //     $version->addMedia(data_get($data, 'version_filename'))->toMediaCollection('downloads');

    //     return $addon;
    // }
}
