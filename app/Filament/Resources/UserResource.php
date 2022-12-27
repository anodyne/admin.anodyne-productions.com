<?php

namespace App\Filament\Resources;

use App\Enums\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationIcon = 'flex-user-multiple';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\Select::make('role')
                        ->required()
                        ->placeholder('Select a role')
                        ->options(
                            collect(UserRole::cases())
                                ->flatMap(fn ($case) => [$case->value => $case->displayName()])
                                ->all()
                        )
                        ->visible(fn () => auth()->user()->isAdmin)
                        ->columnSpan(2),
                    Forms\Components\Toggle::make('is_exchange_author')
                        ->label('Exchange author')
                        ->helperText('Can this user create add-ons in Exchange?')
                        ->columnSpan('full'),
                    Forms\Components\Toggle::make('is_blog_author')
                        ->label('Blog author')
                        ->helperText('Can this user create blog posts?')
                        ->columnSpan('full'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn (User $record) => $record->email)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                        );
                    }),
                Tables\Columns\BadgeColumn::make('role')
                    ->enum(
                        collect(UserRole::cases())->flatMap(fn ($role) => [$role->value => $role->displayName()])->all()
                    )
                    ->colors([
                        'bg-amber-100 dark:bg-amber-900 text-amber-700 dark:text-amber-400' => UserRole::admin->value,
                        'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-400' => UserRole::staff->value,
                        'bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-400' => UserRole::user->value,
                    ]),
                Tables\Columns\IconColumn::make('is_exchange_author')
                    ->boolean()
                    ->label('Exchange Author')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
                Tables\Columns\IconColumn::make('is_blog_author')
                    ->boolean()
                    ->label('Blog Author')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options(array_map(
                        fn ($role) => $role->value,
                        UserRole::cases()
                    )),
                Tables\Filters\TernaryFilter::make('is_exchange_author')->label('Is Exchange Author'),
                Tables\Filters\TernaryFilter::make('is_blog_author')->label('Is Blog Author'),
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
                    ->iconButton(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
