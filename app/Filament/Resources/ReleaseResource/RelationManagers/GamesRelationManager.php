<?php

namespace App\Filament\Resources\ReleaseResource\RelationManagers;

use App\Enums\GameGenre;
use App\Models\Game;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class GamesRelationManager extends RelationManager
{
    protected static string $relationship = 'games';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn (Game $record): string => $record->url ?? '')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('url', 'like', "%{$search}%")
                        );
                    }),
                Tables\Columns\BadgeColumn::make('genre')
                    ->enum(
                        collect(GameGenre::cases())
                            ->flatMap(fn ($genre) => [$genre->value => $genre->displayName()])
                            ->all()
                    ),
                Tables\Columns\TextColumn::make('php_version')->label('PHP version'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
