import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios';
window.axios = axios;
import auth from './stores/auth.js';
import VueAxios from 'vue-axios';
import router from './routers/index.js'



import './assets/css/sidebar.css';
import './style.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';

import './assets/js/sdk.js';



const app = createApp(App)
app.use(VueAxios, axios)
axios.defaults.baseURL = process.env.VUE_APP_API_URL;
// app.use(auth, {
//     rememberkey:         'auth_remember',
//     tokenDefaultKey:     'auth_token_default',
//     tokenImpersonateKey: 'auth_token_impersonate',
//     stores:              ['storage', 'cookie'],
// });
app.use(auth)
app.use(router)
app.mount('#app')