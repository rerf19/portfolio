<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'short_description',
        'full_description',
        'technologies',
        'github_url',
        'live_url',
        'images',
        'videos',
        'team',
        'status',
        'year',
        'featured',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'technologies' => 'array',
            'images' => 'array',
            'videos' => 'array',
            'team' => 'array',
            'status' => ProjectStatus::class,
            'featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    /**
     * New projects go to the end of the list, and uploaded screenshots are
     * removed from disk when they are dropped from a project or the project
     * itself is deleted.
     */
    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            $project->sort_order ??= (static::max('sort_order') ?? -1) + 1;
        });

        static::updated(function (Project $project) {
            if (! $project->wasChanged('images')) {
                return;
            }

            $removed = array_diff($project->getOriginal('images') ?? [], $project->images ?? []);
            Storage::disk('public')->delete($removed);
        });

        static::deleted(function (Project $project) {
            Storage::disk('public')->delete($project->images ?? []);
        });
    }

    /**
     * Only projects visible on the public site, in display order.
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true)->orderBy('sort_order');
    }

    /**
     * Every technology used across all projects, for tag suggestions.
     *
     * @return list<string>
     */
    public static function allTechnologies(): array
    {
        return static::query()
            ->pluck('technologies')
            ->flatten()
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();
    }
}
