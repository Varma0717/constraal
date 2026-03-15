<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Tables;
use App\Models\Page;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('slug')->required()->unique(Page::class, 'slug'),
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\RichEditor::make('content'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('slug'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecords::route('/'),
        ];
    }
}
