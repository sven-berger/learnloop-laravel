import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  build: {
    rollupOptions: {
      output: {
        manualChunks(id) {
          if (!id.includes("node_modules")) return;

          if (id.includes("@ckeditor")) return "ckeditor";
          if (id.includes("@fortawesome")) return "fontawesome";
          if (id.includes("alpinejs") || id.includes("@hotwired/stimulus"))
            return "ui-runtime";
          if (id.includes("axios")) return "http";

          return "vendor";
        },
      },
    },
  },
  plugins: [
    tailwindcss(),
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: true,
    }),
  ],
});
