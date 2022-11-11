require('./bootstrap')

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import router from './router/index'
import App from './src/App.vue'
import Vuesax from 'vuesax'
import store from './store/index'

import 'vuesax/dist/vuesax.css'

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(Vuesax)

const app = new Vue({
  el: '#app',
  router,
  store: store,
  components: { App }
})