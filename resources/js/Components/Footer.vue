<template>
    <footer class="bg-dark py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ currentYear }} Rodrigo Ferreira. All rights reserved.
                </p>

                <div class="flex items-center space-x-6 mt-4 md:mt-0">
                    <a
                        href="https://github.com/rerf19"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-coral transition"
                    >
                        GitHub
                    </a>
                    <a
                        href="https://www.linkedin.com/in/rodrigo-ferreira9/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-coral transition"
                    >
                        LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { computed } from "vue";

const currentYear = computed(() => new Date().getFullYear());
</script>
