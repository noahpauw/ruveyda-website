import { createRouter, createWebHistory } from 'vue-router'
import HomeComponent from '../components/routes/HomeComponent.vue'
import AboutMeComponent from '../components/routes/AboutMeComponent.vue'
import AppointmentComponent from '../components/routes/AppointmentComponent.vue'
import EmptyRouteComponent from '../components/routes/EmptyRouteComponent.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeComponent
  }, {
    path: '/aboutme',
    name: 'aboutme',
    component: AboutMeComponent
  }, {
    path: '/afspraak',
    name: 'afspraak',
    component: AppointmentComponent
  }, {
    path: '/mijn-afspraak',
    name: 'mijn-afspraak',
    component: EmptyRouteComponent
  }, {
    path: '/contact',
    name: 'contact',
    component: EmptyRouteComponent
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior() {
    return {
      top: 0
    }
  }
})

export default router
