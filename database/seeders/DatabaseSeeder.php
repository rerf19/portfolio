<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Site content (projects, experience, about) lives in the database and is
     * managed in the admin panel; restore it from a database backup.
     *
     * The admin login comes from ADMIN_EMAIL / ADMIN_PASSWORD in .env, or
     * can be created with `php artisan make:filament-user`.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}
