import Vue from 'vue'
import Vuex from 'vuex'

import users from './modules/users'
import chat from './modules/chat'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        users,
        chat
    }
})

export default store
