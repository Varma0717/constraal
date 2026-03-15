<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Tables;
use App\Models\Job;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\TextInput::make('location'),
            Forms\Components\Select::make('category')->options(['Robotics' => 'Robotics', 'Embedded' => 'Embedded', 'Software' => 'Software']),
            Forms\Components\Textarea::make('description'),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('category'),
            Tables\Columns\TextColumn::make('location'),
            Tables\Columns\IconColumn::make('is_active'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecords::route('/'),
        ];
    }
}
