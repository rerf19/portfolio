<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

/**
 * Initial projects, migrated from the old hardcoded array in
 * ProjectController. Only creates missing rows (matched on slug), so
 * re-running never overwrites edits made in the admin panel.
 */
class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'slug' => 'portfolio-website',
                'title' => 'Portfolio Website',
                'short_description' => 'This website!',
                'full_description' => 'This is my personal portfolio website, built to showcase my projects and skills. It was designed with a clean and modern aesthetic, using a combination of Laravel 11 for the backend and Vue 3 with Tailwind CSS for the frontend. The website is fully responsive and features smooth navigation thanks to Inertia.js. It is also containerized using Docker for easy deployment and scalability.',
                'technologies' => ['Laravel 11', 'Vue 3', 'Tailwind CSS', 'Inertia.js', 'Docker'],
                'github_url' => 'https://github.com/rerf19/portfolio',
                'live_url' => 'https://rodrigoferreira.dev',
                'team' => [
                    ['name' => 'Rodrigo Ferreira', 'role' => 'Full Stack Developer', 'link' => 'https://github.com/rerf19'],
                ],
                'featured' => true,
                'status' => 'live',
                'year' => '2026',
            ],
            [
                'slug' => 'cosmos-media',
                'title' => 'Cosmos Media',
                'short_description' => 'Website for a photography and video production company specialising in high-quality visual content for brands and businesses.',
                'full_description' => 'Cosmos Media is a Portuguese photography and video production company that transforms ideas into unique, high-quality visual content for businesses, brands, and individuals. Services include professional photography, video production, event coverage, corporate production, multi-camera production, and aerial drone footage. The website was designed and developed to reflect the company\'s identity and communicate their story effectively to clients.',
                'technologies' => [],
                'github_url' => null,
                'live_url' => 'https://cosmosmedia.pt',
                'status' => 'live',
                'year' => '2026',
            ],
            [
                'slug' => 'jose-mario-photographer',
                'title' => 'Jose Mario Photographer',
                'short_description' => 'Photographer portfolio, information pages and gallery.',
                'full_description' => 'Photographer portfolio, information pages and gallery.',
                'technologies' => ['PHP', 'HTML', 'CSS', 'Bootstrap', 'JavaScript'],
                'github_url' => 'https://github.com/rerf19/portfolio-jose-mario-fotografia',
                'live_url' => null,
                'status' => 'archived',
                'year' => '2024',
            ],
            [
                'slug' => 'leetcode-neetcode',
                'title' => 'LeetCode Challenges',
                'short_description' => 'Practical LeetCode challenges in Python.',
                'full_description' => 'Practical LeetCode challenges in Python. In Development.',
                'technologies' => ['Python'],
                'github_url' => 'https://github.com/rerf19/leetcode-neetcode',
                'live_url' => null,
                'status' => 'in-development',
                'year' => '2023',
            ],
            [
                'slug' => 'vm-selector',
                'title' => 'VM Selector',
                'short_description' => 'Create your own Terraform code to create virtual machines in multiple cloud providers.',
                'full_description' => 'Create your own Terraform code to create virtual machines in multiple cloud providers.',
                'technologies' => ['JavaScript', 'Node.js', 'MongoDB', 'Terraform', 'Azure', 'AWS'],
                'github_url' => 'https://github.com/rerf19/VMselector',
                'live_url' => 'https://rerf19.serv00.net/',
                'status' => 'live',
                'year' => '2023',
            ],
            [
                'slug' => 'brightness-controller-ubuntu',
                'title' => 'Brightness Controller to Ubuntu',
                'short_description' => 'Ubuntu brightness UI controller for multiple monitors.',
                'full_description' => 'Ubuntu brightness UI controller for multiple monitors. In Development.',
                'technologies' => ['Python'],
                'github_url' => 'https://github.com/rerf19/brightness-controller-ubuntu',
                'live_url' => null,
                'status' => 'archived',
                'year' => '2023',
            ],
            [
                'slug' => 's-tiago-a-rufar',
                'title' => 'S.Tiago a Rufar',
                'short_description' => 'High school project. Main page and user-only page for the organisation of a group.',
                'full_description' => 'High school project. Main page and user-only page for the organisation of a group.',
                'technologies' => ['JavaScript', 'Node.js', 'HTML', 'CSS', 'Bootstrap', 'MySQL'],
                'github_url' => 'https://github.com/rerf19/s-tiago-a-rufar',
                'live_url' => 'https://s-tiago-a-rufar.vercel.app/',
                'status' => 'archived',
                'year' => '2022',
            ],
            [
                'slug' => 'terraform-azure-dev-environment',
                'title' => 'Terraform AZURE Dev Environment',
                'short_description' => 'Set up a development environment on Azure.',
                'full_description' => 'Set up a development environment on Azure. Not Updated - Terminated.',
                'technologies' => ['Terraform', 'Azure'],
                'github_url' => 'https://github.com/rerf19/Terraform-AZRUE-Dev-Environment',
                'live_url' => null,
                'status' => 'archived',
                'year' => '2022',
            ],
            [
                'slug' => 'terraform-aws-dev-environment',
                'title' => 'Terraform AWS Dev Environment',
                'short_description' => 'Set up a development environment on AWS.',
                'full_description' => 'Set up a development environment on AWS. Not Updated - Terminated.',
                'technologies' => ['Terraform', 'AWS'],
                'github_url' => 'https://github.com/rerf19/Terraform-AWS-Dev-Environment',
                'live_url' => null,
                'status' => 'archived',
                'year' => '2022',
            ],
            [
                'slug' => 'csharp-small-projects',
                'title' => 'C# Small Projects',
                'short_description' => 'A bunch of small projects made in C#.',
                'full_description' => 'A bunch of small projects made in C#. Not Updated - Terminated.',
                'technologies' => ['C#', 'Visual Studio'],
                'github_url' => 'https://github.com/rerf19/c-sharp-small-projects',
                'live_url' => null,
                'status' => 'archived',
                'year' => '2022',
            ],
        ];

        foreach ($projects as $index => $project) {
            Project::firstOrCreate(
                ['slug' => $project['slug']],
                $project + ['sort_order' => $index],
            );
        }
    }
}
