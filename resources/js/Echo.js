import store from './vuex/store'

window.Echo.join('larachat_database_chatroom')
.here(users => {
    console.log('Usuários Online:')
    console.log(users)

    store.commit('ADD_ONLINE_USERS', users)
})
.joining(user => {
    console.log('Entrou:')
    console.log(user)

    store.commit('ADD_ONLINE_USER', user)
})
.leaving(user => {
    console.log('Saiu:')
    console.log(user)

    store.commit('REMOVE_ONLINE_USER', user)
})
