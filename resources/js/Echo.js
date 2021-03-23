import Vue from 'vue'
import store from './vuex/store'

const userId = window.Laravel.user

window.Echo.channel(`larachat_database_private-chat.${userId}`)
.listen('NewMessageCreated', (e) => {
    let conversation = e.message

    if (store.state.chat.userConversation == null
        || store.state.chat.userConversation.id != conversation.sender.id) {

            if (!store.state.me.me.preference.me_notify) return

            Vue.$vToastify.success(`
                Messagem: ${conversation.message}
            `, `${conversation.sender.name} te enviou uma nova mensagem`)
        } else {
            conversation.me = false
            store.state.chat.messages.push(conversation)
        }

    store.commit('UPDATE_TOTAL_UNREAD_MESSAGES', conversation.sender.id)
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
