<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Tables;
use App\Models\HomepageSection;

class HomepageSectionResource extends Resource
{
    protected static ?string $model = HomepageSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-view-grid';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('section_key')->required()->unique(HomepageSection::class, 'section_key'),
            Forms\Components\TextInput::make('title'),
            Forms\Components\RichEditor::make('content'),
            Forms\Components\Textarea::make('data')->rows(4),
            Forms\Components\TextInput::make('order')->numeric(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('section_key'),
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('order'),
        ])->defaultSort('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecords::route('/'),
        ];
    }
}
