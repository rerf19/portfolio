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
     */
    private function getAllProjects(): array
    {
        return [
            // [
            //     'slug' => '',
            //     'title' => '',
            //     'shortDescription' => '',
            //     'fullDescription' => '',
            //     'technologies' => ['Tech 1', 'Tech 2'],
            //     'github' => 'https://github.com/rerf19/portfolio',
            //     'live' => 'https://rodrigoferreira.dev',
            //     'images' => [],
            //     'videos' => [],
            //     'team' => [
            //         ['name' => 'Rodrigo Ferreira', 'role' => 'Full Stack Developer', 'link' => 'https://github.com/rerf19'],
            //     ],
            //     'featured' => true or false,
            //     'status' => 'live' or 'archived' or 'in-development',
            //     'year' => ''
            // ],
            [
                'slug' => 'portfolio-website',
                'title' => 'Portfolio Website',
                'shortDescription' => 'This website!',
                'fullDescription' => 'This is my personal portfolio website, built to showcase my projects and skills. It was designed with a clean and modern aesthetic, using a combination of Laravel 11 for the backend and Vue 3 with Tailwind CSS for the frontend. The website is fully responsive and features smooth navigation thanks to Inertia.js. It is also containerized using Docker for easy deployment and scalability.',
                'technologies' => ['Laravel 11', 'Vue 3', 'Tailwind CSS', 'Inertia.js', 'Docker'],
                'github' => 'https://github.com/rerf19/portfolio',
                'live' => 'https://rodrigoferreira.dev',
                'images' => [],
                'videos' => [],
                'team' => [
                    ['name' => 'Rodrigo Ferreira', 'role' => 'Full Stack Developer', 'link' => 'https://github.com/rerf19'],
                ],
                'featured' => true,
                'status' => 'live',
                'year' => '2026'
            ],
            [
                'slug' => 'cosmos-media',
                'title' => 'Cosmos Media',
                'shortDescription' => 'Website for a photography and video production company specialising in high-quality visual content for brands and businesses.',
                'fullDescription' => 'Cosmos Media is a Portuguese photography and video production company that transforms ideas into unique, high-quality visual content for businesses, brands, and individuals. Services include professional photography, video production, event coverage, corporate production, multi-camera production, and aerial drone footage. The website was designed and developed to reflect the company\'s identity and communicate their story effectively to clients.',
                'technologies' => [],
                'github' => null,
                'live' => 'https://cosmosmedia.pt',
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'live',
                'year' => '2026'
            ],
            [
                'slug' => 'jose-mario-photographer',
                'title' => 'Jose Mario Photographer',
                'shortDescription' => 'Photographer portfolio, information pages and gallery.',
                'fullDescription' => 'Photographer portfolio, information pages and gallery.',
                'technologies' => ['PHP', 'HTML', 'CSS', 'Bootstrap', 'JavaScript'],
                'github' => 'https://github.com/rerf19/portfolio-jose-mario-fotografia',
                'live' => null,
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'archived',
                'year' => '2024'
            ],
            [
                'slug' => 'leetcode-neetcode',
                'title' => 'LeetCode Challenges',
                'shortDescription' => 'Practical LeetCode challenges in Python.',
                'fullDescription' => 'Practical LeetCode challenges in Python. In Development.',
                'technologies' => ['Python'],
                'github' => 'https://github.com/rerf19/leetcode-neetcode',
                'live' => null,
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'in-development',
                'year' => '2023'
            ],
            [
                'slug' => 'vm-selector',
                'title' => 'VM Selector',
                'shortDescription' => 'Create your own Terraform code to create virtual machines in multiple cloud providers.',
                'fullDescription' => 'Create your own Terraform code to create virtual machines in multiple cloud providers.',
                'technologies' => ['JavaScript', 'Node.js', 'MongoDB', 'Terraform', 'Azure', 'AWS'],
                'github' => 'https://github.com/rerf19/VMselector',
                'live' => 'https://rerf19.serv00.net/',
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'live',
                'year' => '2023'
            ],
            [
                'slug' => 'brightness-controller-ubuntu',
                'title' => 'Brightness Controller to Ubuntu',
                'shortDescription' => 'Ubuntu brightness UI controller for multiple monitors.',
                'fullDescription' => 'Ubuntu brightness UI controller for multiple monitors. In Development.',
                'technologies' => ['Python'],
                'github' => 'https://github.com/rerf19/brightness-controller-ubuntu',
                'live' => null,
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'archived',
                'year' => '2023'
            ],
            [
                'slug' => 's-tiago-a-rufar',
                'title' => 'S.Tiago a Rufar',
                'shortDescription' => 'High school project. Main page and user-only page for the organisation of a group.',
                'fullDescription' => 'High school project. Main page and user-only page for the organisation of a group.',
                'technologies' => ['JavaScript', 'Node.js', 'HTML', 'CSS', 'Bootstrap', 'MySQL'],
                'github' => 'https://github.com/rerf19/s-tiago-a-rufar',
                'live' => 'https://s-tiago-a-rufar.vercel.app/',
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'archived',
                'year' => '2022'
            ],
            [
                'slug' => 'terraform-azure-dev-environment',
                'title' => 'Terraform AZURE Dev Environment',
                'shortDescription' => 'Set up a development environment on Azure.',
                'fullDescription' => 'Set up a development environment on Azure. Not Updated - Terminated.',
                'technologies' => ['Terraform', 'Azure'],
                'github' => 'https://github.com/rerf19/Terraform-AZRUE-Dev-Environment',
                'live' => null,
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'archived',
                'year' => '2022'
            ],
            [
                'slug' => 'terraform-aws-dev-environment',
                'title' => 'Terraform AWS Dev Environment',
                'shortDescription' => 'Set up a development environment on AWS.',
                'fullDescription' => 'Set up a development environment on AWS. Not Updated - Terminated.',
                'technologies' => ['Terraform', 'AWS'],
                'github' => 'https://github.com/rerf19/Terraform-AWS-Dev-Environment',
                'live' => null,
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'archived',
                'year' => '2022'
            ],
            [
                'slug' => 'csharp-small-projects',
                'title' => 'C# Small Projects',
                'shortDescription' => 'A bunch of small projects made in C#.',
                'fullDescription' => 'A bunch of small projects made in C#. Not Updated - Terminated.',
                'technologies' => ['C#', 'Visual Studio'],
                'github' => 'https://github.com/rerf19/c-sharp-small-projects',
                'live' => null,
                'images' => [],
                'videos' => [],
                'team' => [],
                'featured' => false,
                'status' => 'archived',
                'year' => '2022'
            ],
        ];
    }
}
