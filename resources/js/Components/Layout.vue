<template>
    <div
        class="min-h-screen bg-dark text-white flex flex-col finisher-header"
        style="position: relative"
    >
        <!-- Side Menu (Desktop) -->
        <SideMenu />

        <!-- Mobile Menu -->
        <MobileMenu />

        <main class="flex-1 relative" style="z-index: 1">
            <slot />
        </main>

        <Footer style="position: relative; z-index: 1" />
    </div>
</template>

<script setup>
import SideMenu from "./SideMenu.vue";
import MobileMenu from "./MobileMenu.vue";
import Footer from "./Footer.vue";
import { onMounted, onUnmounted, nextTick } from "vue";

let finisherInstance = null;

onMounted(async () => {
    // Wait for DOM to be fully rendered
    await nextTick();

    // Small delay to ensure the element is in the DOM
    setTimeout(() => {
        // Remove any existing canvas first to avoid duplicates
        const existingCanvas = document.getElementById("finisher-canvas");
        if (existingCanvas) {
            existingCanvas.remove();
        }

        if (typeof window.FinisherHeader !== "undefined") {
            try {
                finisherInstance = new window.FinisherHeader({
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
            } catch (e) {
                console.error("FinisherHeader error:", e);
            }
        } else {
            console.warn("FinisherHeader is not defined");
        }
    }, 100);
});

onUnmounted(() => {
    const canvas = document.getElementById("finisher-canvas");
    if (canvas) {
        canvas.remove();
    }
});
</script>
