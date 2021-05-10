require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import routes from './routes.js';
import store  from './store/index';

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
 
Vue.component('Home', require('./components/Home.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('Card', require('./components/Card'));
Vue.component('PageLoader', require('./components/Loaders/PageLoader'));

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

Vue.use(VueRouter);

const router = new VueRouter(
  routes
)

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters.loggedIn) {
      next({
        path: '/login',
        query: { redirectFrom: to.fullPath }
    
      })
    } else {
      next()
    }
  } else {
    next()
  }
})

router.afterEach(to => {
  if(to.meta.title !== undefined) {
    let documentTitle = 'HomuProperties'
    let routeTitle = to.meta.title
    document.title = documentTitle + ' | ' + routeTitle
  } else {
    console.log("Has no Document title")
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
Vue.filter('shillings', function(value) {
  if(!value) return ''
  value = value.toString();
  return 'Ugx: ' + value
})

const app = new Vue({
      router,
      store,
      el: '#app'
});






