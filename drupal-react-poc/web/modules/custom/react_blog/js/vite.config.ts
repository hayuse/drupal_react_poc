import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import { visualizer } from 'rollup-plugin-visualizer' // インポート


// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    react({ babel: true }),
     visualizer({
      open: true, // ビルド後に自動でレポートを開く
      filename: "dist/stats.html", // レポートの出力先
    }),
  ],
  // Vite開発サーバーのオリジンを設定
  server: {
    host: '0.0.0.0',
    // origin: 'http://localhost:32769',
    hmr: {
      host: 'localhost',
    },
  },
  build: {
    // ビルド成果物の出力先
    outDir: 'dist',
    // マニフェストファイルを生成
    manifest: true,
    rollupOptions: {
      // エントリーポイントを指定
      input: '/src/index.tsx',
      output: {
        entryFileNames: 'main.js',
        assetFileNames: 'style.css',
      },
    },
  },
});
