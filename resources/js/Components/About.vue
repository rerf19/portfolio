<template>
    <section id="about" class="py-20 bg-gray-900/50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span
                            class="bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent"
                        >
                            About Me
                        </span>
                    </h2>
                    <div
                        class="w-20 h-1 bg-gradient-to-r from-coral to-mint mx-auto"
                    ></div>
                </div>

                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Left: Description -->
                    <div data-aos="fade-right">
                        <!-- TODO: Update with your personal information -->
                        <h3 class="text-3xl font-bold mb-6">Hi, I'm Rodrigo</h3>
                        <p class="text-gray-300 mb-4 text-lg">
                            Full Stack Developer / Software Developer
                        </p>
                        <p class="text-gray-400 mb-4">
                            Versatile Problem Solver and Collaborative
                            Enthusiast.
                        </p>
                        <p class="text-gray-400 mb-4">
                            Educational Excellence and Proactive Management.
                        </p>
                        <p class="text-gray-400">
                            Technical Proficiency and Customer-Centric Approach.
                        </p>
                    </div>

                    <!-- Right: Skills -->
                    <div data-aos="fade-left">
                        <h4 class="text-2xl font-bold mb-6">
                            Skills & Technologies
                        </h4>

                        <!-- TODO: Update with your actual skills -->
                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="bg-dark p-4 rounded-lg border border-gray-800 hover:border-coral transition"
                            >
                                <div class="text-coral mb-2">
                                    <svg
                                        class="w-8 h-8"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="font-semibold mb-1">Frontend</h5>
                                <p class="text-sm text-gray-400">
                                    Vue, React, Tailwind
                                </p>
                            </div>

                            <div
                                class="bg-dark p-4 rounded-lg border border-gray-800 hover:border-mint transition"
                            >
                                <div class="text-mint mb-2">
                                    <svg
                                        class="w-8 h-8"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="font-semibold mb-1">Backend</h5>
                                <p class="text-sm text-gray-400">
                                    Laravel, Node.js, PHP
                                </p>
                            </div>

                            <div
                                class="bg-dark p-4 rounded-lg border border-gray-800 hover:border-peach transition"
                            >
                                <div class="text-peach mb-2">
                                    <svg
                                        class="w-8 h-8"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="font-semibold mb-1">Database</h5>
                                <p class="text-sm text-gray-400">
                                    MySQL, PostgreSQL
                                </p>
                            </div>

                            <div
                                class="bg-dark p-4 rounded-lg border border-gray-800 hover:border-coral transition"
                            >
                                <div class="text-coral mb-2">
                                    <svg
                                        class="w-8 h-8"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="font-semibold mb-1">Tools</h5>
                                <p class="text-sm text-gray-400">
                                    Git, Docker, VS Code
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
// Component logic here
</script>
