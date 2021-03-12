import store from './vuex/store'

const userId = window.Laravel.user

window.Echo.channel(`larachat_database_private-chat.${userId}`)
.listen('NewMessageCreated', (e) => {
    console.log(e.message)
})

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
