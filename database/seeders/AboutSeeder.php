<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * Initial About page bio, migrated from the old hardcoded array in
 * PageController. Only seeds when no bio has been saved yet, so re-running
 * never overwrites edits made in the admin panel.
 */
class AboutSeeder extends Seeder
{
    public function run(): void
    {
        if (Setting::get('about.paragraphs') !== null) {
            return;
        }

        Setting::set('about.paragraphs', [
            'I’m a developer working in PHP and Drupal. My interest in tech started with computer games and grew into a curiosity about how systems work behind the scenes.',
            'These days I enjoy building random stuff, learning new technologies, especially around AI. I value clear communication and collaboration, while also being comfortable working independently and taking ownership of tasks.',
            'Outside of tech, you’ll usually find me playing volleyball or spending time with friends. I’m always open to new opportunities that are interesting, challenging, and give me the chance to keep learning.',
        ]);
    }
}
