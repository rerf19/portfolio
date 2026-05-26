<template>
    <Layout>
        <div class="container mx-auto px-6 py-20">
            <!-- Page Title -->
            <h1 class="text-5xl font-bold mb-16">
                <span
                    class="bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent"
                >
                    About Me
                </span>
            </h1>

            <!-- Bio -->
            <div class="grid lg:grid-cols-3 gap-12 mb-20 items-start">
                <!-- Text -->
                <div class="lg:col-span-2">
                    <p class="text-xl text-gray-300 mb-6 leading-relaxed">
                        {{ bio }}
                    </p>
                    <p class="text-xl text-gray-300 mb-6 leading-relaxed">
                        {{ bio2 }}
                    </p>
                    <p class="text-xl text-gray-300 leading-relaxed">
                        {{ bio3 }}
                    </p>
                </div>

                <!-- Profile photo -->
                <div class="flex justify-center lg:justify-start">
                    <div
                        class="w-full max-w-xs rounded-2xl overflow-hidden border border-gray-800 shadow-lg aspect-square"
                    >
                        <img
                            src="/images/profile.jpg"
                            alt="Rodrigo Ferreira"
                            class="w-full h-full object-cover object-top"
                        />
                    </div>
                </div>
            </div>

            <!-- Interests -->
            <div class="mb-20">
                <h2 class="text-2xl font-bold mb-8 text-white">
                    Outside of Work
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <!-- Gaming -->
                    <div
                        class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col items-center gap-3 hover:border-coral transition-colors duration-300"
                    >
                        <span class="text-4xl">🎮</span>
                        <span class="text-sm font-medium text-gray-300"
                            >Gaming</span
                        >
                    </div>

                    <!-- Volleyball -->
                    <div
                        class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col items-center gap-3 hover:border-coral transition-colors duration-300"
                    >
                        <span class="text-4xl">🏐</span>
                        <span class="text-sm font-medium text-gray-300"
                            >Volleyball</span
                        >
                    </div>

                    <!-- Gym & Life Balance -->
                    <div
                        class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col items-center gap-3 hover:border-coral transition-colors duration-300"
                    >
                        <span class="text-4xl">🏋️</span>
                        <span class="text-sm font-medium text-gray-300"
                            >Gym &amp; Balance</span
                        >
                    </div>

                    <!-- AI & Tech -->
                    <div
                        class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col items-center gap-3 hover:border-coral transition-colors duration-300"
                    >
                        <span class="text-4xl">🤖</span>
                        <span class="text-sm font-medium text-gray-300"
                            >AI &amp; Tech</span
                        >
                    </div>

                    <!-- Building Things -->
                    <div
                        class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col items-center gap-3 hover:border-coral transition-colors duration-300"
                    >
                        <span class="text-4xl">🔧</span>
                        <span class="text-sm font-medium text-gray-300"
                            >Building Things</span
                        >
                    </div>
                </div>
            </div>

            <!-- CV Download -->
            <div
                class="border-t border-gray-800 pt-12 flex flex-col sm:flex-row items-start sm:items-center gap-4"
            >
                <div>
                    <h2 class="text-xl font-bold text-white mb-1">
                        Want to know more?
                    </h2>
                    <p class="text-gray-400 text-sm">
                        Have a look on my CV for a full overview of my
                        experience and skills.
                    </p>
                </div>
                <a
                    href="/RodrigoFerreiraCV.pdf"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="shrink-0 inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-coral to-mint text-white font-semibold rounded-lg hover:opacity-90 transition-opacity duration-200"
                >
                    View CV
                </a>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../Components/Layout.vue";

defineProps({
    bio: String,
    bio2: String,
    bio3: String,
});
</script>
