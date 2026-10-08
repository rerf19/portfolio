<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use App\Models\Setting;
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
        return Inertia::render('About', [
            'paragraphs' => Setting::get('about.paragraphs', []),
        ]);
    }

    public function experience(): Response
    {
        $experiences = Experience::query()->orderByDesc('start_date')->get();

        return Inertia::render('Experience', [
            'experiences' => ExperienceResource::collection($experiences)->resolve(),
        ]);
    }
}
