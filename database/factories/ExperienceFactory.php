<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'position' => fake()->jobTitle(),
            'location' => fake()->city(),
            'description' => null,
            'achievements' => [fake()->sentence()],
            'start_date' => fake()->dateTimeBetween('-5 years', '-1 year')->format('Y-m-01'),
            'end_date' => null,
        ];
    }
}
