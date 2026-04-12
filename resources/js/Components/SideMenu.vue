<template>
    <!-- Desktop Side Menu -->
    <nav
        class="fixed right-8 top-1/2 transform -translate-y-1/2 z-40 hidden lg:block"
    >
        <ul class="space-y-6">
            <li v-for="item in menuItems" :key="item.route">
                <Link
                    :href="item.route"
                    class="group flex items-center justify-end transition-all duration-300 relative"
                    :class="
                        isActive(item.route)
                            ? 'text-coral'
                            : 'text-gray-500 hover:text-coral'
                    "
                >
                    <span
                        class="text-sm font-medium absolute right-14 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity bg-gray-900 px-3 py-1 rounded-lg"
                    >
                        {{ item.label }}
                    </span>
                    <div
                        class="w-10 h-10 rounded-lg border-2 transition-all flex items-center justify-center"
                        :class="
                            isActive(item.route)
                                ? 'border-coral bg-coral/20 scale-110'
                                : 'border-gray-700 group-hover:border-coral group-hover:scale-105'
                        "
                        v-html="item.icon"
                    ></div>
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();

const menuItems = [
    {
        label: "Home",
        route: "/",
        icon: '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>',
    },
    {
        label: "About",
        route: "/about",
        icon: '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
    },
    {
        label: "Experience",
        route: "/experience",
        icon: '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
    },
    {
        label: "Projects",
        route: "/projects",
        icon: '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>',
    },
];

const isActive = (route) => {
    const currentUrl = page.url;
    if (route === "/") {
        return currentUrl === "/";
    }
    return currentUrl.startsWith(route);
};
</script>
