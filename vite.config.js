import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
  resolve: {
    alias: {
      "@AceAdmin": "../../packages/ace-admin-package/resources/js",
    },
  },
  plugins: [
    laravel({
      input: ["resources/js/app.js"],
      publicDirectory: "public",
      buildDirectory: "vendor/ace-admin",
      refresh: true,
    }),
    vue(),
  ],
});
