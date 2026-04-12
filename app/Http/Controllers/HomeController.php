<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display the home page with all sections
     */
    public function index(): Response
    {
        // TODO: Replace this with actual project data from database
        // You can create a Project model and fetch from database
        $projects = [
            [
                'title' => 'Portfolio Website',
                'description' => 'A modern, responsive portfolio website built with Laravel, Inertia.js, and Vue 3. Features smooth animations and a clean design.',
                'technologies' => ['Laravel', 'Vue 3', 'Tailwind CSS', 'Inertia.js'],
                'github' => 'https://github.com/rerf19/portfolio',
                'live' => 'https://rodrigoferreira.dev'
            ],
            // Add more projects here
        ];

        return Inertia::render('Home', [
            'projects' => $projects
        ]);
    }
}
