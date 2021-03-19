export default {
    state: {
        userConversation: null,
        messages: []
    },

    mutations: {
        ADD_USER_CONVERSATION (state, user) {
            state.userConversation = user
        },

        REMOVE_USER_CONVERSATION (state, user) {
            state.userConversation = null
        },

        ADD_MESSAGES (state, messages) {
            state.messages = messages
        },

        ADD_MESSAGE (state, message) {
            state.messages.push(message)
        },

        CLEAR_MESSAGES (state) {
            state.messages = []
        },
    },

    actions: {
        getMessagesConversation ({ state, commit, dispatch }) {
            commit('CLEAR_MESSAGES')

            return axios.get(`/api/v1/messages/${state.userConversation.id}`)
                        .then(response => {
                            commit('ADD_MESSAGES', response.data.data)

                            dispatch('markConversationsAsRead')
                        })
        },

        sendNewMessage ({ state, commit }, message) {
            return axios.post('/api/v1/messages', {
                message,
                receiver_id: state.userConversation.id
            })
            .then(response => {
                commit('ADD_MESSAGE', {
                    message: message,
                    receiver: {... state.userConversation},
                    me: true
                })
            })
        },

        markConversationsAsRead ({ commit, state }) {
            return axios.patch('/api/v1/messages/mark_as_read', {sender: state.userConversation.id})
                            .then(response => commit('CLEAR_TOTAL_UNREAD_MESSAGES', state.userConversation.id))
        }
    },

    getters: {

    }
}
