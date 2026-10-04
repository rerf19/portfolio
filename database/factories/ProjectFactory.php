<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(3, true);

        return [
            'slug' => Str::slug($title),
            'title' => Str::title($title),
            'short_description' => fake()->sentence(),
            'full_description' => fake()->paragraph(),
            'technologies' => fake()->randomElements(['PHP', 'Laravel', 'Vue', 'Python', 'Docker'], 2),
            'github_url' => fake()->url(),
            'live_url' => null,
            'status' => ProjectStatus::Live,
            'year' => (string) fake()->year(),
            'featured' => false,
            'is_published' => true,
        ];
    }

    public function unpublished(): static
    {
        return $this->state(fn () => ['is_published' => false]);
    }
}
