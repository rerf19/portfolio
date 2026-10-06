<?php

namespace Tests\Feature;

use App\Models\Experience;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ContentPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_experience_is_ordered_newest_first_with_a_period_label(): void
    {
        Experience::factory()->create([
            'company' => 'Old Co',
            'start_date' => '2021-09-01',
            'end_date' => '2023-06-01',
        ]);
        Experience::factory()->create([
            'company' => 'Current Co',
            'start_date' => '2024-05-01',
            'end_date' => null,
        ]);

        $this->get('/experience')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Experience', false)
                ->has('experiences', 2)
                ->where('experiences.0.company', 'Current Co')
                ->where('experiences.0.period', 'May 2024 – Now')
                ->where('experiences.1.period', 'Sep 2021 – Jun 2023')
            );
    }

    public function test_about_renders_saved_paragraphs(): void
    {
        Setting::set('about.paragraphs', ['First.', 'Second.']);

        $this->get('/about')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('About', false)
                ->where('paragraphs', ['First.', 'Second.'])
            );
    }

    public function test_about_renders_without_saved_paragraphs(): void
    {
        $this->get('/about')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page->where('paragraphs', []));
    }
}
