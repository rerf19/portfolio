<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Creates the admin panel login from ADMIN_EMAIL / ADMIN_PASSWORD in .env,
 * so no credentials live in the repository. Skipped when either is empty.
 * Re-running resets the password to the .env value.
 */
class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = config('auth.admin');

        if (blank($admin['email']) || blank($admin['password'])) {
            $this->command?->warn('ADMIN_EMAIL / ADMIN_PASSWORD not set, skipping admin user.');

            return;
        }

        User::updateOrCreate(
            ['email' => $admin['email']],
            ['name' => $admin['name'], 'password' => $admin['password']],
        );
    }
}
