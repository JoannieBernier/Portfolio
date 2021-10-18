import { createRouter, createWebHashHistory } from 'vue-router'
import Accueil from '../pages/Accueil'
import Recette from '../pages/Recette'

const routes = [
  {
    path: '/',
    name: 'Accueil',
    component: Accueil
  },
  {
    path: '/recette/:id',
    name: 'Recette',
    component: Recette
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
