<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectStatus: string implements HasColor, HasLabel
{
    case Live = 'live';
    case InDevelopment = 'in-development';
    case Archived = 'archived';
    case Private = 'private';

    public function getLabel(): string
    {
        return match ($this) {
            self::Live => 'Live',
            self::InDevelopment => 'In Development',
            self::Archived => 'Archived',
            self::Private => 'Private',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Live => 'success',
            self::InDevelopment => 'info',
            self::Archived => 'gray',
            self::Private => 'warning',
        };
    }
}
