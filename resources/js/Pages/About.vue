<template>
    <Layout>
        <div class="container mx-auto px-6 py-20">
            <h1 class="text-5xl font-bold mb-8">
                <span
                    class="bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent"
                >
                    About Me
                </span>
            </h1>

            <div class="max-w-4xl">
                <!-- TODO: Update with your bio -->
                <p class="text-xl text-gray-300 mb-8">{{ bio }}</p>

                <!-- Skills Grid -->
                <div class="grid md:grid-cols-2 gap-6 mt-12">
                    <div
                        v-for="skillGroup in skills"
                        :key="skillGroup.category"
                        class="bg-gray-900 p-6 rounded-lg border border-gray-800"
                    >
                        <h3 class="text-xl font-bold mb-4 text-coral">
                            {{ skillGroup.category }}
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="skill in skillGroup.items"
                                :key="skill"
                                class="px-3 py-1 bg-dark border border-gray-700 rounded-full text-sm"
                            >
                                {{ skill }}
                            </span>
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
    bio: String,
    skills: Array,
});
</script>
