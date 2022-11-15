import Registrasi from '../src/pages/registrasi'
import login from '../src/pages/login'
import admin from '../src/pages/admin'
import user from '../src/pages/user'
import homepage from '../src/pages/homepage'

const routes = [{
    path: '/',
    component: homepage,
    name: 'homepage'
  },
  {
    path: '/registrasi',
    component: Registrasi,
    name: 'registrasi'
  },
  {
    path: '/login',
    component: login,
    name: 'login'
  },
  {
    path: '/admin',
    component: admin,
    name: 'admin',
    meta: {
      requiresAuth: true,
      isAdmin: true
    }
  },
  {
    path: '/user',
    component: user,
    name: 'user',
    meta: {
      requiresAuth: true,
      isUser: true
    }
  },


]

export default routes;
