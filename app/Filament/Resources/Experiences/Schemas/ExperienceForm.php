<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Role')
                    ->columns(2)
                    ->schema([
                        TextInput::make('position')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('company')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('location')
                            ->maxLength(255),
                        DatePicker::make('start_date')
                            ->label('Started')
                            ->required()
                            ->native(false)
                            ->displayFormat('M Y'),
                        DatePicker::make('end_date')
                            ->label('Ended')
                            ->helperText('Leave empty if this is your current role.')
                            ->native(false)
                            ->displayFormat('M Y')
                            ->afterOrEqual('start_date'),
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Key achievements')
                    ->schema([
                        Repeater::make('achievements')
                            ->hiddenLabel()
                            ->simple(
                                Textarea::make('text')
                                    ->required()
                                    ->rows(2),
                            )
                            ->addActionLabel('Add achievement')
                            ->defaultItems(0),
                    ]),
            ]);
    }
}
