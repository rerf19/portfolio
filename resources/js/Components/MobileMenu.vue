<template>
    <!-- Burger Menu Button -->
    <button
        @click="toggleMenu"
        class="fixed top-6 right-6 z-50 lg:hidden w-12 h-12 flex items-center justify-center bg-dark/80 backdrop-blur-sm border-2 border-gray-700 rounded-lg hover:border-coral transition"
    >
        <div class="w-6 h-5 flex flex-col justify-between">
            <span
                class="w-full h-0.5 bg-white transition-all duration-300"
                :class="isOpen ? 'rotate-45 translate-y-2' : ''"
            ></span>
            <span
                class="w-full h-0.5 bg-white transition-all duration-300"
                :class="isOpen ? 'opacity-0' : ''"
            ></span>
            <span
                class="w-full h-0.5 bg-white transition-all duration-300"
                :class="isOpen ? '-rotate-45 -translate-y-2' : ''"
            ></span>
        </div>
    </button>

    <!-- Full Page Menu Overlay -->
    <Transition
        enter-active-class="transition-all duration-500 ease-out"
        leave-active-class="transition-all duration-500 ease-in"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="isOpen"
            class="fixed inset-0 bg-dark/95 backdrop-blur-lg z-40 lg:hidden flex items-center justify-center"
        >
            <nav class="text-center">
                <ul class="space-y-8">
                    <li
                        v-for="(item, index) in menuItems"
                        :key="item.route"
                        :style="{ animationDelay: `${index * 0.1}s` }"
                        class="animate-fade-in"
                    >
                        <Link
                            :href="item.route"
                            @click="closeMenu"
                            class="text-4xl font-bold transition-all duration-300"
                            :class="
                                isActive(item.route)
                                    ? 'bg-gradient-to-r from-coral to-mint bg-clip-text text-transparent'
                                    : 'text-gray-400 hover:text-white'
                            "
                        >
                            {{ item.label }}
                        </Link>
                    </li>
                </ul>

                <!-- Social Links in Menu -->
                <div
                    class="flex justify-center gap-8 mt-16 animate-fade-in"
                    style="animation-delay: 0.4s"
                >
                    <a
                        href="https://github.com/rerf19"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-coral transition"
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
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-mint transition"
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
            </nav>
        </div>
    </Transition>
</template>

<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const isOpen = ref(false);

const menuItems = [
    { label: "Home", route: "/" },
    { label: "About", route: "/about" },
    { label: "Experience", route: "/experience" },
    { label: "Projects", route: "/projects" },
];

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};

const closeMenu = () => {
    isOpen.value = false;
};

const isActive = (route) => {
    const currentUrl = page.url;
    if (route === "/") {
        return currentUrl === "/";
    }
    return currentUrl.startsWith(route);
};
</script>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.5s ease-out forwards;
}
</style>
