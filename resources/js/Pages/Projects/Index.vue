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
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <Link
                    v-for="(project, index) in projects"
                    :key="project.slug"
                    :href="`/projects/${project.slug}`"
                    class="group bg-gray-900 rounded-lg overflow-hidden border border-gray-800 hover:border-coral transition-all duration-300 hover:transform hover:-translate-y-2"
                >
                    <!-- Project Image -->
                    <div
                        class="relative h-48 bg-gradient-to-br from-coral/20 to-mint/20 overflow-hidden"
                    >
                        <div
                            class="absolute inset-0 flex items-center justify-center text-6xl font-bold text-white/10"
                        >
                            {{ project.year }}
                        </div>
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
                            {{ project.shortDescription }}
                        </p>

                        <!-- Tech Stack -->
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="tech in project.technologies.slice(0, 3)"
                                :key="tech"
                                class="px-3 py-1 bg-dark border border-gray-700 rounded-full text-xs text-gray-300"
                            >
                                {{ tech }}
                            </span>
                            <span
                                v-if="project.technologies.length > 3"
                                class="px-3 py-1 text-xs text-gray-500"
                            >
                                +{{ project.technologies.length - 3 }}
                            </span>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../../Components/Layout.vue";
import { Link, Head } from "@inertiajs/vue3";

defineProps({
    projects: Array,
});
</script>
