<template>
    <div class="min-h-screen bg-dark text-white flex flex-col">
        <!-- Side Menu (Desktop) -->
        <SideMenu />

        <!-- Mobile Menu -->
        <MobileMenu />

        <main class="flex-1">
            <slot />
        </main>

        <Footer />
    </div>
</template>

<script setup>
import SideMenu from "./SideMenu.vue";
import MobileMenu from "./MobileMenu.vue";
import Footer from "./Footer.vue";
</script>
