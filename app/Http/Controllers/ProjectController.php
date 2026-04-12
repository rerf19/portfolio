<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * Display all projects
     */
    public function index(): Response
    {
        // TODO: Fetch from database when you create Project model
        $projects = $this->getAllProjects();

        return Inertia::render('Projects/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Display individual project
     */
    public function show(string $slug): Response
    {
        // TODO: Fetch from database by slug
        $projects = $this->getAllProjects();
        $project = collect($projects)->firstWhere('slug', $slug);

        if (!$project) {
            abort(404);
        }

        return Inertia::render('Projects/Show', [
            'project' => $project
        ]);
    }

    /**
     * Get all projects data
     * TODO: Replace with database queries
     */
    private function getAllProjects(): array
    {
        return [
            [
                'slug' => 'portfolio-website',
                'title' => 'Portfolio Website',
                'shortDescription' => 'A modern, responsive portfolio website built with Laravel, Inertia.js, and Vue 3.',
                'fullDescription' => 'This portfolio showcases a complete transformation from traditional Laravel+Bootstrap to a cutting-edge stack using Inertia.js and Vue 3. Features include smooth page transitions, dynamic content loading, and a fully responsive design.',
                'technologies' => ['Laravel 11', 'Vue 3', 'Tailwind CSS', 'Inertia.js', 'Docker'],
                'github' => 'https://github.com/rerf19/portfolio',
                'live' => 'https://rodrigoferreira.dev',
                'images' => [
                    // '/images/projects/portfolio/screenshot-1.jpg',
                ],
                'videos' => [
                    // 'https://youtube.com/embed/...',
                ],
                'team' => [
                    ['name' => 'Rodrigo Ferreira', 'role' => 'Full Stack Developer'],
                ],
                'featured' => true,
                'year' => '2026'
            ],
            // TODO: Add more projects here
        ];
    }
}
