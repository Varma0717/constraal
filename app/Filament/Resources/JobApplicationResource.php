<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Tables;
use App\Models\JobApplication;

class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('job_id')->relationship('job', 'title')->required(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('email')->email()->required(),
            Forms\Components\Textarea::make('cover_letter'),
            Forms\Components\FileUpload::make('resume_path')->directory('resumes')->disk('local'),
            Forms\Components\Select::make('status')->options(['New' => 'New', 'In Review' => 'In Review', 'Responded' => 'Responded'])->default('New'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('job.title')->label('Position'),
            Tables\Columns\TextColumn::make('status'),
            Tables\Columns\TextColumn::make('created_at')->date(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecords::route('/'),
        ];
    }
}
