require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import routes from './routes.js';
import store  from './store/index';

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
 
Vue.component('Home', require('./components/Home.vue').default);
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

Vue.use(VueRouter);

const router = new VueRouter(


      routes
)

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!store.getters.loggedIn) {
      next({
        path: '/login',
        query: { redirectFrom: to.fullPath }
    
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (store.getters.loggedIn) {
      next({
        replace: true,
        path: '/'
      })
    } else {
      next()
    }
  } else {
    next() // make sure to always call next()!
  }
})
Vue.filter('capitalize', function(value) {
  if(!value) return ''
  value = value.toString();
  return value.charAt(0).toUpperCase() + value.slice(1)
})

Vue.filter('toUpperCase', function(value) {
  if(!value) return ''
  value = value.toString();
  return value.toUpperCase()
})

const app = new Vue({
      router,
      store,
      el: '#app'
});






