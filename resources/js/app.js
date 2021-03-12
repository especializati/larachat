require('./bootstrap');

window.Vue = require('vue').default;
import VueToastify from 'vue-toastify'

import store from './vuex/store'

Vue.use(VueToastify, {position: 'top-right'})

Vue.component('chat-component', require('./components/Chat/ChatComponent.vue').default);

const app = new Vue({
    el: '#app',
    store
});
