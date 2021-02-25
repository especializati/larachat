require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('chat-component', require('./components/Chat/ChatComponent.vue').default);

const app = new Vue({
    el: '#app',
});
