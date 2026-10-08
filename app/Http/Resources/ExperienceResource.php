<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Shapes an Experience into the props used by Pages/Experience.vue.
 *
 * @mixin \App\Models\Experience
 */
class ExperienceResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'company' => $this->company,
            'position' => $this->position,
            'period' => $this->period,
            'location' => $this->location,
            'description' => $this->description ?? '',
            'achievements' => $this->achievements ?? [],
        ];
    }
}
