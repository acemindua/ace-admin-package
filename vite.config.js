import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      // Якщо ти використовуєш .vue файли (SFC), есмі-браузер не обов'язковий,
      // але хай буде для сумісності
      vue: "vue/dist/vue.esm-browser.js",
    },
  },
  build: {
    rollupOptions: {
      // Точка входу — твій JS, який імпортує CSS
      input: path.resolve(__dirname, "resources/js/app.js"),
      output: {
        // Фіксована назва для JS
        entryFileNames: "app.js",
        // Фіксована назва для CSS
        assetFileNames: (assetInfo) => {
          if (assetInfo.name === "style.css") return "app.css";
          return assetInfo.name;
        },
      },
    },
    outDir: "dist",
    emptyOutDir: true,
  },
});
