import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import 'vuetify/styles/main.css'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// 2. アイコンフォントのCSSをインポート
import '@mdi/font/css/materialdesignicons.css'
// 3. Vuetifyのインスタンスを作成
const vuetify = createVuetify({
  components,
  directives,
})

createApp(App).use(vuetify).mount('#vue-blog-root')
