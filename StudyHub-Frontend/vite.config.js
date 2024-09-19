import vue from '@vitejs/plugin-vue'
import { defineConfig, loadEnv } from 'vite'


// https://vitejs.dev/config/
export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), '');
  return {
    define: {
      'process.env': env
    },
    plugins: [vue()],
    chainWebpack: config => {
      config.resolve.alias.set(
        'vue$',
        // If using the runtime only build
        path.resolve(__dirname, 'node_modules/vue/dist/vue.runtime.esm.js')
        // Or if using full build of Vue (runtime + compiler)
        // path.resolve(__dirname, 'node_modules/vue/dist/vue.esm.js')
      )
    }
  }
})
