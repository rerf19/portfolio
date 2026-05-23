<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function home(): Response
    {
        return Inertia::render('Home');
    }

    public function about(): Response
    {
        $data = [
            'bio' => 'I’m a developer working in PHP and Drupal. My interest in tech started with computer games and grew into a curiosity about how systems work behind the scenes.',
            'bio2' => 'These days I enjoy building random stuff, learning new technologies, especially around AI. I value clear communication and collaboration, while also being comfortable working independently and taking ownership of tasks.',
            'bio3' => 'Outside of tech, you’ll usually find me playing volleyball or spending time with friends. I’m always open to new opportunities that are interesting, challenging, and give me the chance to keep learning.',
        ];

        return Inertia::render('About', $data);
    }

    public function experience(): Response
    {
        $experiences = [
            [
                'company' => 'Numiko',
                'position' => 'Junior Back End Developer',
                'period' => 'May 2024 – Now',
                'location' => 'Leeds, UK',
                'description' => '',
                'achievements' => [
                    'Contribute to multi-client Drupal projects, collaborating within cross-functional teams to deliver high-quality solutions.',
                    'Develop and implement new features, ensuring seamless integration and functionality within the project scope.',
                    'Identify, debug, and resolve technical challenges, proactively proposing and implementing innovative solutions to clients to optimize project outcomes.',
                    'Applied AI-driven development practices with Claude Code to improve backend development efficiency and delivery.',
                    'Contributed to the development and maintenance of a Drupal module within the open-source ecosystem.',
                ]
            ],
            [
                'company' => 'Freelance',
                'position' => 'Freelance',
                'period' => 'Sep 2023 - Now',
                'location' => 'Remote',
                'description' => '',
                'achievements' => [
                    'Designed and developed a visually stunning portfolio website for a photographer, showcasing their work in a captivating and user-friendly manner.',
                    'Proactively provided ongoing support and maintenance, demonstrating a commitment to client satisfaction and fostering long-term partnerships.',
                ]
            ],
            [
                'company' => 'Lancaster University',
                'position' => 'IT Operations Assistant',
                'period' => 'Sep 2021 - Jun 2023',
                'location' => 'Lancaster, England, United Kingdom',
                'description' => '',
                'achievements' => [
                    'Actively preserved and maintained campus hardware, ensuring optimal functionality throughout the tenure.',
                    'Improved IT equipment maintenance procedures, decreasing equipment failure rates by 90% within a year.',
                    'Prioritized and completed tasks efficiently, consistently meeting or exceeding deadlines during the role.',
                ]
            ],
        ];

        return Inertia::render('Experience', [
            'experiences' => $experiences
        ]);
    }
}
