<?php

namespace Tests\Feature;

use App\Enums\ProjectStatus;
use App\Filament\Pages\ManageAbout;
use App\Filament\Resources\Experiences\Pages\CreateExperience;
use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Setting;
use App\Models\User;
use Filament\Forms\Components\Repeater;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminFormsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());

        // Predictable repeater item keys; simple repeater items are filled as ['text' => ...].
        Repeater::fake();
    }

    public function test_a_project_can_be_created_and_is_appended_to_the_end(): void
    {
        Project::factory()->create(['sort_order' => 4]);

        Livewire::test(CreateProject::class)
            ->fillForm([
                'title' => 'Brand New Thing',
                'short_description' => 'Short.',
                'full_description' => 'Long.',
                'technologies' => ['Laravel', 'Vue'],
                'status' => ProjectStatus::InDevelopment,
                'year' => '2026',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $project = Project::where('slug', 'brand-new-thing')->firstOrFail();

        $this->assertSame(['Laravel', 'Vue'], $project->technologies);
        $this->assertSame(ProjectStatus::InDevelopment, $project->status);
        $this->assertTrue($project->is_published);
        $this->assertSame(5, $project->sort_order);
    }

    public function test_project_slugs_must_be_unique(): void
    {
        Project::factory()->create(['slug' => 'taken']);

        Livewire::test(CreateProject::class)
            ->fillForm([
                'title' => 'Another',
                'slug' => 'taken',
                'short_description' => 'Short.',
                'full_description' => 'Long.',
                'year' => '2026',
            ])
            ->call('create')
            ->assertHasFormErrors(['slug' => 'unique']);
    }

    public function test_an_experience_can_be_created(): void
    {
        Livewire::test(CreateExperience::class)
            ->fillForm([
                'position' => 'Senior Developer',
                'company' => 'Acme',
                'start_date' => '2026-01-01',
                'achievements' => [['text' => 'Shipped things.']],
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $experience = Experience::firstOrFail();

        $this->assertSame('Jan 2026 – Now', $experience->period);
        $this->assertSame(['Shipped things.'], $experience->achievements);
    }

    public function test_the_about_bio_can_be_edited(): void
    {
        Setting::set('about.paragraphs', ['Old.']);

        Livewire::test(ManageAbout::class)
            ->assertSchemaStateSet(['paragraphs' => [['text' => 'Old.']]])
            ->fillForm(['paragraphs' => [['text' => 'New first.'], ['text' => 'New second.']]])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame(['New first.', 'New second.'], Setting::get('about.paragraphs'));
    }

    public function test_removed_and_deleted_images_are_cleaned_up(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('projects/keep.png', 'x');
        Storage::disk('public')->put('projects/drop.png', 'x');

        $project = Project::factory()->create(['images' => ['projects/keep.png', 'projects/drop.png']]);

        $project->update(['images' => ['projects/keep.png']]);

        Storage::disk('public')->assertExists('projects/keep.png');
        Storage::disk('public')->assertMissing('projects/drop.png');

        $project->delete();

        Storage::disk('public')->assertMissing('projects/keep.png');
    }
}
