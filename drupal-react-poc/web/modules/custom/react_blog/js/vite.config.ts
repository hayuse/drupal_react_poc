import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react({ babel: true })],
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
