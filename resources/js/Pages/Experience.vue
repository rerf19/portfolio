<template>
    <Layout>
        <div class="container mx-auto px-6 py-20">
            <div
                class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16"
            >
                <h1 class="text-5xl font-bold">
                    <span
                        class="bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent"
                    >
                        Experience
                    </span>
                </h1>
                <a
                    href="/RodrigoFerreiraCV.pdf"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="shrink-0 inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-coral to-mint text-white font-semibold rounded-lg hover:opacity-90 transition-opacity duration-200"
                >
                    View CV
                </a>
            </div>

            <!-- Timeline -->
            <div class="max-w-4xl">
                <div
                    v-for="(exp, index) in experiences"
                    :key="index"
                    class="relative pl-8 pb-12 border-l-2 border-gray-700 last:pb-0"
                >
                    <!-- Timeline dot -->
                    <div
                        class="absolute left-0 top-0 w-4 h-4 bg-coral rounded-full transform -translate-x-[9px]"
                    ></div>

                    <!-- Content -->
                    <div
                        class="bg-gray-900 p-6 rounded-lg border border-gray-800"
                    >
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-2xl font-bold text-white">
                                    {{ exp.position }}
                                </h3>
                                <p class="text-coral font-semibold">
                                    {{ exp.company }}
                                </p>
                            </div>
                            <span class="text-sm text-gray-400">{{
                                exp.period
                            }}</span>
                        </div>

                        <p class="text-gray-300 mb-4">{{ exp.description }}</p>

                        <div v-if="exp.achievements" class="space-y-2">
                            <p class="text-sm font-semibold text-mint">
                                Key Achievements:
                            </p>
                            <ul
                                class="list-disc list-inside text-gray-400 text-sm space-y-1"
                            >
                                <li
                                    v-for="achievement in exp.achievements"
                                    :key="achievement"
                                >
                                    {{ achievement }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../Components/Layout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    experiences: Array,
});
</script>
