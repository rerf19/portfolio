<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'company',
        'position',
        'location',
        'description',
        'achievements',
        'start_date',
        'end_date',
    ];

    protected function casts(): array
    {
        return [
            'achievements' => 'array',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    /**
     * Human-readable date range, e.g. "May 2024 – Now".
     */
    protected function period(): Attribute
    {
        return Attribute::get(fn () => sprintf(
            '%s – %s',
            $this->start_date->format('M Y'),
            $this->end_date?->format('M Y') ?? 'Now',
        ));
    }
}
