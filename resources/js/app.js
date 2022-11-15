require('./bootstrap')

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import router from './router/index'
import App from './src/App.vue'
import Vuesax from 'vuesax'
import store from './store/index'
import VueMeta from 'vue-meta'

import 'vuesax/dist/vuesax.css'
Vue.use(VueMeta)
Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(Vuesax)

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    let token = localStorage.getItem('token') != null;
    if (!token) {
      next({
        path: '/login',
        query: {
          redirect: to.fullPath
        }
      })
    } else {
      let user = JSON.parse(localStorage.getItem('user'))
      let roles = user.role
      console.log(roles);
      if (to.matched.some(record => record.meta.isUser)) {
        if (roles.includes('user')) next()
        else if (roles === 'admin') {
          next({
            name: 'admin'
          })
        } else next({
          name: '/'
        })
      } else if (to.matched.some(record => record.meta.isAdmin)) {
        if (roles.includes('admin')) next()
        else if (roles === 'user') {
          next({
            name: 'user'
          })
        } else next({
          name: '/'
        })
      } else {
        next()
      }
    }
  } else {
    next()
  }
})



const app = new Vue({
  el: '#app',
  router,
  store: store,
  components: {
    App
  }
})
