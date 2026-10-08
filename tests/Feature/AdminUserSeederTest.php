<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminUserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_the_admin_from_config(): void
    {
        config(['auth.admin' => ['name' => 'Admin', 'email' => 'admin@example.test', 'password' => 'secret-pass']]);

        $this->seed(AdminUserSeeder::class);

        $this->assertTrue(Auth::validate(['email' => 'admin@example.test', 'password' => 'secret-pass']));
    }

    public function test_it_skips_when_credentials_are_missing(): void
    {
        config(['auth.admin' => ['name' => 'Admin', 'email' => null, 'password' => null]]);

        $this->seed(AdminUserSeeder::class);

        $this->assertSame(0, User::count());
    }
}
