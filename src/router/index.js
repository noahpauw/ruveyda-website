import { createRouter, createWebHistory } from 'vue-router'
import HomeComponent from '../components/routes/HomeComponent.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeComponent
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
