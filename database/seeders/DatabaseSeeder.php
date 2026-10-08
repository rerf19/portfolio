<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * The admin login comes from ADMIN_EMAIL / ADMIN_PASSWORD in .env, or
     * can be created with `php artisan make:filament-user`.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ProjectSeeder::class,
            ExperienceSeeder::class,
            AboutSeeder::class,
        ]);
    }
}
