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
        // TODO: Add your about/bio data
        $data = [
            'bio' => 'Full Stack Developer / Software Developer with expertise in modern web technologies.',
            'skills' => [
                ['category' => 'Frontend', 'items' => ['Vue', 'React', 'Tailwind CSS']],
                ['category' => 'Backend', 'items' => ['Laravel', 'Node.js', 'PHP']],
                ['category' => 'Database', 'items' => ['MySQL', 'PostgreSQL']],
                ['category' => 'Tools', 'items' => ['Git', 'Docker', 'VS Code']],
            ]
        ];

        return Inertia::render('About', $data);
    }

    public function experience(): Response
    {
        // TODO: Add your work experience
        $experiences = [
            [
                'company' => 'Company Name',
                'position' => 'Full Stack Developer',
                'period' => '2024 - Present',
                'description' => 'Working on modern web applications using Laravel and Vue.js',
                'achievements' => [
                    'Built scalable applications',
                    'Implemented CI/CD pipelines',
                ]
            ],
            // Add more experiences
        ];

        return Inertia::render('Experience', [
            'experiences' => $experiences
        ]);
    }
}
