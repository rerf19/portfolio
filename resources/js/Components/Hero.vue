<template>
    <section
        class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20"
    >
        <!-- Subtle gradient background -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-dark via-dark to-gray-900 opacity-50"
        ></div>

        <!-- Content -->
        <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Main heading -->
                <h1 class="text-6xl md:text-8xl font-bold mb-6">
                    <span
                        class="bg-gradient-to-r from-coral via-mint to-peach bg-clip-text text-transparent"
                    >
                        DEVELOPER
                    </span>
                </h1>

                <!-- Typewriter effect -->
                <div
                    class="text-2xl md:text-3xl text-gray-300 mb-8 h-12 flex items-center justify-center"
                >
                    <span ref="typewriterText" class="font-light"></span>
                    <span class="animate-pulse ml-1">|</span>
                </div>

                <!-- TODO: Update greeting message -->
                <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-12">
                    Full Stack Developer / Software Developer
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button
                        @click="scrollToSection('projects')"
                        class="px-8 py-4 bg-gradient-to-r from-coral to-mint text-white rounded-lg font-semibold hover:opacity-90 transition shadow-lg hover:shadow-xl"
                    >
                        View My Work
                    </button>
                    <button
                        @click="scrollToSection('contact')"
                        class="px-8 py-4 border-2 border-coral text-coral rounded-lg font-semibold hover:bg-coral hover:text-white transition"
                    >
                        Get In Touch
                    </button>
                </div>

                <!-- Scroll indicator -->
                <div class="mt-20 animate-bounce">
                    <svg
                        class="w-6 h-6 mx-auto text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3"
                        ></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import AOS from "aos";

const typewriterText = ref(null);

// TODO: Customize your welcome messages
const messages = [
    "WELCOME TO MY PORTFOLIO!",
    "LET'S BUILD SOMETHING AMAZING",
    "TURNING IDEAS INTO REALITY",
];

let messageIndex = 0;
let charIndex = 0;
let isDeleting = false;

const typeWriter = () => {
    if (!typewriterText.value) return;

    const currentMessage = messages[messageIndex];

    if (isDeleting) {
        typewriterText.value.textContent = currentMessage.substring(
            0,
            charIndex - 1,
        );
        charIndex--;
    } else {
        typewriterText.value.textContent = currentMessage.substring(
            0,
            charIndex + 1,
        );
        charIndex++;
    }

    if (!isDeleting && charIndex === currentMessage.length) {
        isDeleting = true;
        setTimeout(typeWriter, 2000); // Pause at end
        return;
    }

    if (isDeleting && charIndex === 0) {
        isDeleting = false;
        messageIndex = (messageIndex + 1) % messages.length;
    }

    const typingSpeed = isDeleting ? 50 : 100;
    setTimeout(typeWriter, typingSpeed);
};

const scrollToSection = (sectionId) => {
    const element = document.getElementById(sectionId);
    if (element) {
        const headerOffset = 80;
        const elementPosition = element.getBoundingClientRect().top;
        const offsetPosition =
            elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth",
        });
    }
};

onMounted(() => {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: "ease-in-out",
        once: true,
        offset: 100,
    });

    setTimeout(typeWriter, 500);
});
</script>
