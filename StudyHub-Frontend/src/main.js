import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios';
window.axios = axios;



import router from './routers/index.js'

import './assets/css/sidebar.css';
import './style.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';

import './assets/js/sdk.js';






const app = createApp(App)
app.use(router)
app.mount('#app')