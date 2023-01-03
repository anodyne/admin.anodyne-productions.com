<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'flex-game-controller';

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 30;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\Select::make('genre')
                            ->options([
                                'baj' => 'Star Trek: Bajoran',
                                'bl5' => 'Babylon-5',
                                'blank' => 'Blank',
                                'bsg' => 'Battlestar Galactica',
                                'crd' => 'Star Trek: Cardassian',
                                'dnd' => 'Dungeons and Dragons',
                                'ds9' => 'Star Trek: DS9 era',
                                'dsv' => 'seaQuest DSV',
                                'ent' => 'Star Trek: Enterprise era',
                                'kli' => 'Star Trek: Klingon',
                                'mov' => 'Star Trek: Movie era',
                                'rom' => 'Star Trek: Romulan',
                                'sg1' => 'Stargate: SG-1',
                                'sga' => 'Stargate Atlantis',
                                'sto' => 'Star Trek Online',
                                'tos' => 'Star Trek: TOS era',
                            ]),
                        Forms\Components\TextInput::make('url')
                            ->type('url')
                            ->label('URL')
                            ->columnSpan('full'),
                    ])
                    ->columns(2)
                    ->columnSpan('full'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('version')->label('Nova version'),
                        Forms\Components\TextInput::make('php_version')->label('PHP version'),
                        Forms\Components\TextInput::make('server_software'),
                        Forms\Components\TextInput::make('db_driver')->label('Database platform'),
                        Forms\Components\TextInput::make('db_version')->label('Database version'),
                    ])
                    ->columns(2)
                    ->columnSpan('full'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\DatePicker::make('created_at')->label('Initial install'),
                        Forms\Components\DatePicker::make('updated_at')->label('Last update'),
                    ])
                    ->columns(2)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn (Game $record): string => $record->url ?? '')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('genre')
                    ->enum([
                        'baj' => 'Star Trek: Bajoran',
                        'bl5' => 'Babylon-5',
                        'blank' => 'Blank',
                        'bsg' => 'Battlestar Galactica',
                        'crd' => 'Star Trek: Cardassian',
                        'dnd' => 'Dungeons and Dragons',
                        'ds9' => 'Star Trek: DS9 era',
                        'dsv' => 'seaQuest DSV',
                        'ent' => 'Star Trek: Enterprise era',
                        'kli' => 'Star Trek: Klingon',
                        'mov' => 'Star Trek: Movie era',
                        'rom' => 'Star Trek: Romulan',
                        'sg1' => 'Stargate: SG-1',
                        'sga' => 'Stargate Atlantis',
                        'sto' => 'Star Trek Online',
                        'tos' => 'Star Trek: TOS era',
                    ]),
                Tables\Columns\TextColumn::make('version')->label('Nova version'),
                Tables\Columns\TextColumn::make('php_version')->label('PHP version'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary'),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'view' => Pages\ViewGame::route('/{record}'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
