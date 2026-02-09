import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
  plugins: [
    vue({
      template: {
        compilerOptions: {
          isCustomElement: (tag) => tag.startsWith("ace-"),
        },
      },
    }),
  ],
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-browser.js", // Важливо для використання template: ""
    },
  },
  build: {
    lib: {
      entry: "resources/js/app.js",
      formats: ["iife"], // Формат, що працює просто через <script>
      name: "AceAdmin",
      fileName: () => "ace-admin.js",
    },
    outDir: "dist",
  },
});
