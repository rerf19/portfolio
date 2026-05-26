<template>
    <Layout>
        <div class="container mx-auto px-6 py-20">
            <h1 class="text-5xl font-bold mb-16">
                <span
                    class="bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent"
                >
                    Projects
                </span>
            </h1>

            <!-- Projects Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <Link
                    v-for="(project, index) in projects"
                    :key="project.slug"
                    :href="`/projects/${project.slug}`"
                    class="group bg-gray-900 rounded-xl overflow-hidden border border-gray-800 hover:border-coral transition-all duration-300 hover:-translate-y-1 flex flex-col"
                >
                    <!-- Card Header: Status + Year -->
                    <div
                        class="flex items-center justify-between px-5 pt-5 pb-3"
                    >
                        <!-- Status Badge -->
                        <span
                            class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full"
                            :class="statusClass(project.status)"
                        >
                            <span
                                class="w-1.5 h-1.5 rounded-full"
                                :class="[
                                    dotClass(project.status),
                                    project.status === 'live'
                                        ? 'animate-pulse'
                                        : '',
                                ]"
                            ></span>
                            {{ statusLabel(project.status) }}
                        </span>

                        <!-- Year -->
                        <span class="text-xs text-gray-500 font-mono">{{
                            project.year
                        }}</span>
                    </div>

                    <!-- Divider -->
                    <div class="mx-5 border-t border-gray-800"></div>

                    <!-- Card Body -->
                    <div class="p-5 flex flex-col flex-1">
                        <h3
                            class="text-lg font-bold mb-2 group-hover:text-coral transition-colors duration-200"
                        >
                            {{ project.title }}
                        </h3>
                        <p
                            class="text-gray-400 text-sm mb-4 leading-relaxed flex-1"
                        >
                            {{ project.shortDescription }}
                        </p>

                        <!-- Tech Stack -->
                        <div
                            class="flex flex-wrap gap-1.5 mb-4"
                            v-if="project.technologies.length > 0"
                        >
                            <span
                                v-for="tech in project.technologies.slice(0, 3)"
                                :key="tech"
                                class="px-2.5 py-0.5 bg-dark border border-gray-700 rounded-full text-xs text-gray-300"
                            >
                                {{ tech }}
                            </span>
                            <span
                                v-if="project.technologies.length > 3"
                                class="px-2.5 py-0.5 text-xs text-gray-500"
                            >
                                +{{ project.technologies.length - 3 }}
                            </span>
                        </div>

                        <!-- Links -->
                        <div
                            v-if="project.github || project.live"
                            class="flex items-center gap-3 pt-3 border-t border-gray-800"
                        >
                            <a
                                v-if="project.github"
                                :href="project.github"
                                target="_blank"
                                rel="noopener noreferrer"
                                @click.stop
                                class="inline-flex items-center gap-1.5 text-xs text-gray-400 hover:text-coral transition-colors duration-200"
                            >
                                <!-- GitHub icon -->
                                <svg
                                    class="w-3.5 h-3.5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                                    />
                                </svg>
                                GitHub
                            </a>
                            <a
                                v-if="project.live"
                                :href="project.live"
                                target="_blank"
                                rel="noopener noreferrer"
                                @click.stop
                                class="inline-flex items-center gap-1.5 text-xs text-gray-400 hover:text-mint transition-colors duration-200"
                            >
                                <!-- External link icon -->
                                <svg
                                    class="w-3.5 h-3.5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                    />
                                </svg>
                                Live
                            </a>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../../Components/Layout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    projects: Array,
});

function statusLabel(status) {
    const labels = {
        live: "Live",
        "in-development": "In Development",
        archived: "Archived",
        private: "Private",
    };
    return labels[status] ?? status;
}

function statusClass(status) {
    const classes = {
        live: "bg-green-500/10 text-green-400 border border-green-500/20",
        "in-development":
            "bg-blue-500/10 text-blue-400 border border-blue-500/20",
        archived: "bg-gray-500/10 text-gray-400 border border-gray-600/20",
        private: "bg-yellow-500/10 text-yellow-400 border border-yellow-500/20",
    };
    return (
        classes[status] ??
        "bg-gray-500/10 text-gray-400 border border-gray-600/20"
    );
}

function dotClass(status) {
    const classes = {
        live: "bg-green-400",
        "in-development": "bg-blue-400",
        archived: "bg-gray-500",
        private: "bg-yellow-400",
    };
    return classes[status] ?? "bg-gray-500";
}
</script>
