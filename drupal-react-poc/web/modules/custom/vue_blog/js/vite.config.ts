import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import vuetify from "vite-plugin-vuetify";
import { visualizer } from "rollup-plugin-visualizer"; // インポート

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vuetify({
      autoImport: true, // コンポーネントを自動でインポートする
    }),
    visualizer({
      open: true, // ビルド後に自動でレポートを開く
      filename: "dist/stats.html", // レポートの出力先
    }),
  ],
  server: {
    host: "0.0.0.0",
    // origin: 'http://localhost:32769',
    hmr: {
      host: "localhost",
    },
  },
  build: {
    outDir: "dist",
    manifest: true,
    rollupOptions: {
      input: "/src/main.ts",
      output: {
        format: "iife",
        entryFileNames: "main.js",
        assetFileNames: "style.css",
      },
    },
  },
});
