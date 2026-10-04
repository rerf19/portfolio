<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ProjectPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_lists_published_projects_in_sort_order(): void
    {
        Project::factory()->create(['slug' => 'second', 'sort_order' => 2]);
        Project::factory()->create(['slug' => 'first', 'sort_order' => 1]);
        Project::factory()->unpublished()->create(['slug' => 'hidden']);

        $this->get('/projects')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Projects/Index', false)
                ->has('projects', 2)
                ->where('projects.0.slug', 'first')
                ->where('projects.1.slug', 'second')
                ->has('projects.0', fn (Assert $project) => $project
                    ->hasAll([
                        'slug', 'title', 'shortDescription', 'fullDescription',
                        'technologies', 'github', 'live', 'images', 'videos',
                        'team', 'featured', 'status', 'year',
                    ])
                )
            );
    }

    public function test_show_renders_a_published_project(): void
    {
        Project::factory()->create([
            'slug' => 'my-project',
            'images' => ['projects/shot.png', '/images/legacy.png'],
        ]);

        $this->get('/projects/my-project')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Projects/Show', false)
                ->where('project.slug', 'my-project')
                ->where('project.status', 'live')
                ->where('project.images.0', fn ($url) => str_ends_with($url, '/storage/projects/shot.png'))
                ->where('project.images.1', '/images/legacy.png')
            );
    }

    public function test_show_returns_404_for_unpublished_or_unknown_projects(): void
    {
        Project::factory()->unpublished()->create(['slug' => 'draft']);

        $this->get('/projects/draft')->assertNotFound();
        $this->get('/projects/does-not-exist')->assertNotFound();
    }
}
