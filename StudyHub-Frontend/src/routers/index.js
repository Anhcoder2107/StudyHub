import { createMemoryHistory, createRouter, createWebHistory } from 'vue-router'
import admin from './admin.js'
import web from './web.js'

import NotFound from '../components/TheNotFound.vue'



const routes = [...web, ...admin]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router