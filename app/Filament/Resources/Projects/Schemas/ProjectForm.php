<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Enums\ProjectStatus;
use App\Models\Project;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Grid::make(1)
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Details')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, ?string $state, string $operation) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state ?? ''));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->alphaDash()
                                    ->unique(ignoreRecord: true)
                                    ->prefix('/projects/'),
                                Textarea::make('short_description')
                                    ->label('Short description')
                                    ->helperText('Shown on the project card.')
                                    ->required()
                                    ->maxLength(500)
                                    ->rows(2)
                                    ->columnSpanFull(),
                                Textarea::make('full_description')
                                    ->label('Full description')
                                    ->helperText('Shown on the project page.')
                                    ->required()
                                    ->rows(6)
                                    ->columnSpanFull(),
                                TagsInput::make('technologies')
                                    ->placeholder('Add a technology')
                                    ->suggestions(fn () => Project::allTechnologies())
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Media')
                            ->schema([
                                FileUpload::make('images')
                                    ->label('Screenshots')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->directory('projects')
                                    ->maxSize(5120)
                                    ->panelLayout('grid'),
                                Repeater::make('videos')
                                    ->simple(
                                        TextInput::make('url')
                                            ->url()
                                            ->required()
                                            ->placeholder('https://www.youtube.com/embed/VIDEO_ID'),
                                    )
                                    ->helperText('Use the YouTube embed URL (youtube.com/embed/...), not the watch URL.')
                                    ->addActionLabel('Add video')
                                    ->defaultItems(0),
                            ]),

                        Section::make('Team')
                            ->description('Leave empty for solo projects.')
                            ->collapsible()
                            ->schema([
                                Repeater::make('team')
                                    ->hiddenLabel()
                                    ->schema([
                                        TextInput::make('name')->required(),
                                        TextInput::make('role'),
                                        TextInput::make('link')->url(),
                                    ])
                                    ->columns(3)
                                    ->addActionLabel('Add team member')
                                    ->defaultItems(0),
                            ]),
                    ]),

                Grid::make(1)
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_published')
                                    ->label('Published')
                                    ->helperText('Hidden projects are not shown on the site.')
                                    ->default(true),
                                Toggle::make('featured'),
                                Select::make('status')
                                    ->options(ProjectStatus::class)
                                    ->default(ProjectStatus::Live)
                                    ->required(),
                                TextInput::make('year')
                                    ->required()
                                    ->regex('/^\d{4}$/')
                                    ->default(fn () => date('Y')),
                            ]),

                        Section::make('Links')
                            ->schema([
                                TextInput::make('github_url')
                                    ->label('GitHub')
                                    ->url()
                                    ->maxLength(255),
                                TextInput::make('live_url')
                                    ->label('Live site')
                                    ->url()
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }
}
