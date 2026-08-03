import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'dist',
    lib: {
      entry: 'src/optimizer.js',
      name: 'jSquashOptimizer',
      fileName: 'optimizer',
      formats: ['es']
    },
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.wasm')) {
            return '[name][extname]';
          }
          return '[name]-[hash][extname]';
        }
      }
    }
  }
});
