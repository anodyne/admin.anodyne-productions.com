<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'flex-newspaper';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->columns(4)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->columnSpan(2),
                        Forms\Components\RichEditor::make('body')
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Published')
                            ->columnSpan(1),
                        Forms\Components\Grid::make(4)->schema([
                            Forms\Components\Select::make('user_id')
                                ->label('Author')
                                ->relationship('user', 'name'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Author'),
                Tables\Columns\IconColumn::make('published_at')
                    ->boolean()
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user')
                    ->label('Author')
                    ->relationship('user', 'name'),
                Tables\Filters\TernaryFilter::make('published')
                    ->attribute('published_at')
                    ->nullable(),
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
                    ->successNotificationMessage('Blog post deleted'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
