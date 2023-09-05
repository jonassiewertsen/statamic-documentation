import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/index.ts", "resources/css/cp.scss"],
            publicDirectory: "resources/dist",
        }),
    ],
});
