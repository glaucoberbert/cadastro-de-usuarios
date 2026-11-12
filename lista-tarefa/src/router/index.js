import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import Cadastro from '../views/Cadastro.vue'   // NOVO

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: Login,
    },
    //rota da tela de cadastro
    {
      path: '/cadastro',
      name: 'cadastro',
      component: Cadastro,
    },
    {
      path: '/tarefa',
      name: 'tarefa',
      component: import("@/views/Tarefas.vue")
    },
    {
      path: '/categoria',
      name: 'categoria',
      component: import("@/views/Categorias.vue")
    }
  ],
})

export default router