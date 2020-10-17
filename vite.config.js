import { createJsxPlugin } from "vite-jsx/plugin" 

module.exports = {
  plugins: [createJsxPlugin()],
  base: './',
  vueCompilerOptions: {
    isCustomElement: tag => /^x-/.test(tag)
  },
  alias: {
    'vue': 'vue/dist/vue.esm-bundler.js'
  },
  port: 3000
};
