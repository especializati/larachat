require('./bootstrap');

window.Vue = require('vue').default;
import VueToastify from 'vue-toastify'

import store from './vuex/store'
import router from './routes'

Vue.use(VueToastify, {position: 'top-right'})

Vue.component('chat-component', require('./layouts/default.vue').default);

const app = new Vue({
    el: '#app',
    store,
    router
});

store.dispatch('getMe')
