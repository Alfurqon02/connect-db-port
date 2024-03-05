import './bootstrap'

import { createApp } from 'vue'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(router)

alert('app.js is working!')

app.mount('#app')
