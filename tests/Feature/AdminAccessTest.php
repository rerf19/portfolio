<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_admin_login(): void
    {
        $this->get('/admin/projects')->assertRedirect('/admin/login');
    }

    public function test_admins_can_manage_content(): void
    {
        Project::factory()->create(['title' => 'Listed Project']);

        $this->actingAs(User::factory()->create());

        $this->get('/admin/projects')->assertOk()->assertSee('Listed Project');
        $this->get('/admin/projects/create')->assertOk();
        $this->get('/admin/experiences')->assertOk();
        $this->get('/admin/manage-about')->assertOk();
    }
}
