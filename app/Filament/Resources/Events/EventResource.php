<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\Pages\ManageEvents;
use App\Models\Event;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                \Filament\Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                \Filament\Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                \Filament\Forms\Components\Select::make('listing_id')
                    ->relationship('listing', 'title')
                    ->nullable()
                    ->searchable(),
                \Filament\Forms\Components\DateTimePicker::make('start_datetime')
                    ->required(),
                \Filament\Forms\Components\DateTimePicker::make('end_datetime'),
                \Filament\Forms\Components\TextInput::make('location_name'),
                \Filament\Forms\Components\TextInput::make('address'),
                \Filament\Forms\Components\FileUpload::make('image_path')
                    ->directory('events')
                    ->image(),
                \Filament\Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\Select::make('price_type')
                    ->options([
                        'free' => 'Free',
                        'paid' => 'Paid',
                    ])
                    ->default('free'),
                \Filament\Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image_path'),
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('start_datetime')
                    ->dateTime()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('location_name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('price_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'free' => 'success',
                        'paid' => 'warning',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEvents::route('/'),
        ];
    }
}
