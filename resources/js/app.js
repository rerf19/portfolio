import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// Parse initial page data
const initialPage = JSON.parse(
    document.getElementById("app").dataset.page ||
        document.querySelector("[data-page]").textContent,
);

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) }).use(plugin);
        return app.mount(el);
    },
    page: initialPage,
    progress: {
        delay: 0,
        color: "#e8998d",
        includeCSS: true,
        showSpinner: false,
    },
});
