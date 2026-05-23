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

            <div>
                <!-- TODO: Update with your bio -->
                <p class="text-xl text-gray-300 mb-8">{{ bio }}</p>
                <p class="text-xl text-gray-300 mb-8">{{ bio2 }}</p>
                <p class="text-xl text-gray-300 mb-8">{{ bio3 }}</p>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../Components/Layout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    bio: String,
    bio2: String,
    bio3: String,
    skills: Array,
});
</script>
