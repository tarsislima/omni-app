require('./bootstrap')
window.Vue = require('vue')

import App from './App.vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import axios from 'axios'
import { routes } from './routes'
import VueMask from 'v-mask'
import { VueMaskDirective} from 'v-mask'

Vue.use(VueMask)
Vue.directive('mask', VueMaskDirective)

Vue.use(VueRouter)
Vue.use(VueAxios, axios)

const router = new VueRouter({
  mode: 'history',
  routes: routes
})

const app = new Vue({
  el: '#app',
  router: router,
  render: h => h(App),
})


