<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Shapes a Project into the props used by Pages/Projects/*.vue.
 *
 * @mixin \App\Models\Project
 */
class ProjectResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'shortDescription' => $this->short_description,
            'fullDescription' => $this->full_description,
            'technologies' => $this->technologies ?? [],
            'github' => $this->github_url,
            'live' => $this->live_url,
            'images' => array_map($this->imageUrl(...), $this->images ?? []),
            'videos' => $this->videos ?? [],
            'team' => $this->team ?? [],
            'featured' => $this->featured,
            'status' => $this->status->value,
            'year' => $this->year,
        ];
    }

    /**
     * Uploaded files live on the public disk; absolute URLs and
     * root-relative paths (e.g. /images/...) are passed through.
     */
    private function imageUrl(string $path): string
    {
        if (Str::startsWith($path, ['http://', 'https://', '/'])) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }
}
