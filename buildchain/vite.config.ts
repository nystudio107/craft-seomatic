import {defineConfig} from 'vite';
import createVuePlugin from '@vitejs/plugin-vue2'
import ViteRestart from 'vite-plugin-restart';
import {viteExternalsPlugin} from 'vite-plugin-externals'
import viteCompression from 'vite-plugin-compression';
import {visualizer} from 'rollup-plugin-visualizer';
import {nodeResolve} from '@rollup/plugin-node-resolve';
import * as path from 'path';

// https://vitejs.dev/config/
export default defineConfig(({command}) => ({
  base: command === 'serve' ? '' : '/dist/',
  build: {
    emptyOutDir: true,
    manifest: true,
    outDir: '../src/web/assets/dist',
    rollupOptions: {
      input: {
        'dashboard': 'src/js/dashboard.js',
        'content-seo': 'src/js/content-seo.js',
        'seomatic': 'src/js/seomatic.js',
        'seomatic-meta': 'src/js/seomatic-meta.js',
      },
      output: {
        sourcemap: true
      },
    }
  },
  plugins: [
    nodeResolve({
      moduleDirectories: [
        path.resolve('./node_modules'),
      ],
    }),
    ViteRestart({
      reload: [
        './src/templates/**/*',
      ],
    }),
    createVuePlugin(),
    viteExternalsPlugin({
      'vue': 'Vue',
    }),
    viteCompression({
      filter: /\.(js|mjs|json|css|map)$/i
    }),
    visualizer({
      filename: '../src/web/assets/dist/stats.html',
      template: 'treemap',
      sourcemap: true,
    }),
  ],
  optimizeDeps: {
    include: ['vue-confetti', 'vue-apexcharts', 'vue-axios', '@riophae/vue-treeselect'],
  },
  publicDir: '../src/web/assets/public',
  resolve: {
    alias: [
      {find: '@', replacement: path.resolve(__dirname, '../src/web/assets/src')},
      {find: 'vue', replacement: 'vue/dist/vue.esm.js'},
    ],
    preserveSymlinks: true,
  },
  server: {
    fs: {
      strict: false
    },
    host: '0.0.0.0',
    origin: 'http://localhost:' + process.env.DEV_PORT,
    port: parseInt(process.env.DEV_PORT),
    strictPort: true,
  }
}));
