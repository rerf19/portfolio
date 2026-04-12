<template>
    <section id="projects" class="py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span
                            class="bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent"
                        >
                            Featured Projects
                        </span>
                    </h2>
                    <div
                        class="w-20 h-1 bg-gradient-to-r from-coral to-mint mx-auto mb-6"
                    ></div>
                    <p class="text-gray-400 max-w-2xl mx-auto">
                        Here are some of my recent projects. Each one represents
                        a unique challenge and learning experience.
                    </p>
                </div>

                <!-- Projects Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- TODO: Replace with your actual projects -->
                    <!-- Example Project Card -->
                    <div
                        v-for="(project, index) in displayProjects"
                        :key="index"
                        class="group bg-gray-900 rounded-lg overflow-hidden border border-gray-800 hover:border-coral transition-all duration-300 hover:transform hover:-translate-y-2"
                        data-aos="fade-up"
                        :data-aos-delay="index * 100"
                    >
                        <!-- Project Image -->
                        <div
                            class="relative h-48 bg-gradient-to-br from-coral/20 to-mint/20 overflow-hidden"
                        >
                            <div
                                class="absolute inset-0 flex items-center justify-center text-6xl font-bold text-white/10"
                            >
                                {{ index + 1 }}
                            </div>
                            <!-- TODO: Add actual project images -->
                            <div
                                class="absolute inset-0 bg-dark/50 group-hover:bg-dark/30 transition"
                            ></div>
                        </div>

                        <!-- Project Content -->
                        <div class="p-6">
                            <h3
                                class="text-xl font-bold mb-2 group-hover:text-coral transition"
                            >
                                {{ project.title }}
                            </h3>
                            <p class="text-gray-400 text-sm mb-4">
                                {{ project.description }}
                            </p>

                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    v-for="tech in project.technologies"
                                    :key="tech"
                                    class="px-3 py-1 bg-dark border border-gray-700 rounded-full text-xs text-gray-300"
                                >
                                    {{ tech }}
                                </span>
                            </div>

                            <!-- Links -->
                            <div class="flex gap-4">
                                <a
                                    v-if="project.github"
                                    :href="project.github"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-sm text-gray-400 hover:text-coral transition flex items-center gap-1"
                                >
                                    <svg
                                        class="w-4 h-4"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                                        />
                                    </svg>
                                    Code
                                </a>
                                <a
                                    v-if="project.live"
                                    :href="project.live"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-sm text-gray-400 hover:text-mint transition flex items-center gap-1"
                                >
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                        ></path>
                                    </svg>
                                    Live Demo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View More Button -->
                <div class="text-center mt-12" data-aos="fade-up">
                    <a
                        href="https://github.com/rerf19"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-block px-8 py-4 border-2 border-coral text-coral rounded-lg font-semibold hover:bg-coral hover:text-white transition"
                    >
                        View More on GitHub
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    projects: {
        type: Array,
        default: () => [],
    },
});

// TODO: Replace with actual project data from backend or add your projects here
const defaultProjects = [
    {
        title: "Project One",
        description:
            "A modern web application built with Laravel and Vue.js. Features include user authentication, real-time updates, and responsive design.",
        technologies: ["Laravel", "Vue.js", "Tailwind"],
        github: "https://github.com/rerf19",
        live: null,
    },
    {
        title: "Project Two",
        description:
            "An innovative solution for managing complex data workflows with an intuitive interface and powerful backend.",
        technologies: ["Node.js", "React", "MongoDB"],
        github: "https://github.com/rerf19",
        live: null,
    },
    {
        title: "Project Three",
        description:
            "A mobile-first application focusing on user experience and performance optimization.",
        technologies: ["PHP", "MySQL", "Bootstrap"],
        github: "https://github.com/rerf19",
        live: null,
    },
];

const displayProjects = computed(() => {
    return props.projects.length > 0 ? props.projects : defaultProjects;
});
</script>
