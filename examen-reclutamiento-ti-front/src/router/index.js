import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/crud',
    name: 'Crud',
    component: () => import('../views/Crud.vue')
  },
  {
    path: '/mercado-libre',
    name: 'MercadoLibre',
    component: () => import('../views/MercadoLibre.vue')
  },
  {
    path: '/reqres',
    name: 'Reqres',
    component: () => import('../views/Reqres.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
