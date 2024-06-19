import { createRouter, createWebHashHistory } from 'vue-router'
import HomeComponent from '../components/routes/HomeComponent.vue'
import AboutMeComponent from '../components/routes/AboutMeComponent.vue'
import AppointmentComponent from '../components/routes/AppointmentComponent.vue'
import EmptyRouteComponent from '../components/routes/EmptyRouteComponent.vue'
import TermsOfServiceComponent from '../components/routes/TermsOfServiceComponent.vue'
import ThanksComponent from '../components/routes/ThanksComponent.vue'
import MyAppointmentComponent from '../components/routes/MyAppointmentComponent.vue'
import CMSComponent from '../components/routes/cms/CMSComponent.vue'
import TreatmentsComponent from '../components/routes/TreatmentsComponent.vue'
import ContactComponent from '../components/routes/ContactComponent.vue'

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
    component: ContactComponent
  }, {
    path: '/algemene-voorwaarden',
    name: 'algemene-voorwaarden',
    component: TermsOfServiceComponent
  }, {
    path: '/bedankt',
    name: 'bedankt',
    component: ThanksComponent
  }, {
    path: '/mijn-afspraak',
    name: 'mijn-afspraak',
    component: MyAppointmentComponent
  }, {
    path: '/cms',
    name: 'cms',
    component: CMSComponent
  }, {
    path: '/behandelingen',
    name: 'behandelingen',
    component: TreatmentsComponent
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior() {
    return {
      top: 0
    }
  }
})

export default router
