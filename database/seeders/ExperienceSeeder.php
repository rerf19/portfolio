<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

/**
 * Initial work experience, migrated from the old hardcoded array in
 * PageController. Only creates missing rows (matched on company +
 * position), so re-running never overwrites edits made in the admin panel.
 */
class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'Numiko',
                'position' => 'Junior Back End Developer',
                'start_date' => '2024-05-01',
                'end_date' => null,
                'location' => 'Leeds, UK',
                'achievements' => [
                    'Contribute to multi-client Drupal projects, collaborating within cross-functional teams to deliver high-quality solutions.',
                    'Develop and implement new features, ensuring seamless integration and functionality within the project scope.',
                    'Identify, debug, and resolve technical challenges, proactively proposing and implementing innovative solutions to clients to optimize project outcomes.',
                    'Applied AI-driven development practices with Claude Code to improve backend development efficiency and delivery.',
                    'Contributed to the development and maintenance of a Drupal module within the open-source ecosystem.',
                ],
            ],
            [
                'company' => 'Freelance',
                'position' => 'Freelance',
                'start_date' => '2023-09-01',
                'end_date' => null,
                'location' => 'Remote',
                'achievements' => [
                    'Designed and developed a visually stunning portfolio website for a photographer, showcasing their work in a captivating and user-friendly manner.',
                    'Proactively provided ongoing support and maintenance, demonstrating a commitment to client satisfaction and fostering long-term partnerships.',
                ],
            ],
            [
                'company' => 'Lancaster University',
                'position' => 'IT Operations Assistant',
                'start_date' => '2021-09-01',
                'end_date' => '2023-06-01',
                'location' => 'Lancaster, England, United Kingdom',
                'achievements' => [
                    'Actively preserved and maintained campus hardware, ensuring optimal functionality throughout the tenure.',
                    'Improved IT equipment maintenance procedures, decreasing equipment failure rates by 90% within a year.',
                    'Prioritized and completed tasks efficiently, consistently meeting or exceeding deadlines during the role.',
                ],
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::firstOrCreate(
                ['company' => $experience['company'], 'position' => $experience['position']],
                $experience,
            );
        }
    }
}
