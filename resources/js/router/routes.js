import Registrasi from '../src/pages/Registrasi'
import login from '../src/pages/Login'
import admin from '../src/pages/Admin'
import user from '../src/pages/User'
import homepage from '../src/pages/Homepage'

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
