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
import 'bootstrap/dist/js/bootstrap.min.js';

import './assets/js/sdk.js';


// vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'

const vuetify = createVuetify({
  components,
  directives,
  icons: {
    defaultSet: 'fa',
    aliases,
    sets: {
      fa,
      mdi,
    },
  },
})



const app = createApp(App)
app.use(VueAxios, axios)
axios.defaults.baseURL = process.env.VUE_APP_API_URL;
app.use(auth)
app.use(router)
app.use(vuetify)
app.mount('#app')