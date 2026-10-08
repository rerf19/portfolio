<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * Display all projects
     */
    public function index(): Response
    {
        $projects = Project::published()->get();

        return Inertia::render('Projects/Index', [
            'projects' => ProjectResource::collection($projects)->resolve(),
        ]);
    }

    /**
     * Display individual project
     */
    public function show(string $slug): Response
    {
        $project = Project::published()->where('slug', $slug)->firstOrFail();

        return Inertia::render('Projects/Show', [
            'project' => ProjectResource::make($project)->resolve(),
        ]);
    }
}
