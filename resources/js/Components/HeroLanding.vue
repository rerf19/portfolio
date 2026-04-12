<template>
    <section
        class="min-h-screen flex items-center justify-center relative overflow-hidden header finisher-header"
    >
        <!-- Particle background container -->
        <canvas id="finisher-canvas" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Main heading with your name -->
                <h1 class="text-6xl md:text-8xl font-bold mb-6">
                    <span
                        class="bg-gradient-to-r from-coral via-mint to-peach bg-clip-text text-transparent"
                    >
                        <!-- TODO: Replace with your name -->
                        Rodrigo Ferreira
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-12">
                    <!-- TODO: Update your tagline -->
                    Full Stack Developer / Software Developer
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Link
                        href="/projects"
                        class="px-8 py-4 bg-gradient-to-r from-coral to-mint text-white rounded-lg font-semibold hover:opacity-90 transition shadow-lg hover:shadow-xl"
                    >
                        View My Work
                    </Link>
                    <Link
                        href="/about"
                        class="px-8 py-4 border-2 border-coral text-coral rounded-lg font-semibold hover:bg-coral hover:text-white transition"
                    >
                        About Me
                    </Link>
                </div>

                <!-- Social Links -->
                <div class="flex justify-center gap-6 mt-12">
                    <!-- TODO: Update social links -->
                    <a
                        href="https://github.com/rerf19"
                        target="_blank"
                        class="text-gray-400 hover:text-coral transition text-3xl"
                    >
                        <svg
                            class="w-8 h-8"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                            />
                        </svg>
                    </a>
                    <a
                        href="https://www.linkedin.com/in/rodrigo-ferreira9/"
                        target="_blank"
                        class="text-gray-400 hover:text-mint transition text-3xl"
                    >
                        <svg
                            class="w-8 h-8"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted } from "vue";
import { Link } from "@inertiajs/vue3";

onMounted(() => {
    // Initialize particle background
    if (typeof FinisherHeader !== "undefined") {
        new FinisherHeader({
            count: 110,
            size: {
                min: 2,
                max: 10,
                pulse: 0.1,
            },
            speed: {
                x: { min: 0, max: 0.6 },
                y: { min: 0, max: 0.6 },
            },
            colors: {
                background: "#1c1c1c",
                particles: ["#e8998d", "#b0e298", "#eed2cc"],
            },
            blending: "overlay",
            opacity: {
                center: 1,
                edge: 0,
            },
            skew: 0,
            shapes: ["c"],
        });
    }
});
</script>

<style scoped>
/* Arrow animation */
.arrows path {
    animation: arrow 2s infinite;
}
.arrows .a1 {
    animation-delay: -1s;
}
.arrows .a2 {
    animation-delay: -0.5s;
}

@keyframes arrow {
    0% {
        opacity: 0;
    }
    40% {
        opacity: 1;
    }
    80% {
        opacity: 0;
    }
    100% {
        opacity: 0;
    }
}
</style>
