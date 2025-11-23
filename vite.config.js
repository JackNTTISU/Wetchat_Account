import { defineConfig, loadEnv } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig(({ mode }) => {
  // 加载环境变量
  const env = loadEnv(mode, process.cwd())
  
  return {
    plugins: [vue()],
    resolve: {
      alias: {
        '@': path.resolve(__dirname, './src')
      }
    },
    server: {
      port: 3000,
      open: true,
      // API代理配置（开发环境）
      proxy: {
        '/api': {
          target: env.VITE_API_BASE_URL || 'http://localhost:8080',
          changeOrigin: true,
          // 如果后台API没有/api前缀，可以重写路径
          // rewrite: (path) => path.replace(/^\/api/, '')
        }
      }
    },
    // 环境变量配置
    define: {
      __APP_ENV__: JSON.stringify(env.VITE_APP_ENV)
    }
  }
})

