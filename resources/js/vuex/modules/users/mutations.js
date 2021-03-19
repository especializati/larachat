export default {
    ADD_ALL_USERS (state, users) {
        state.users = users
    },

    ADD_ONLINE_USERS (state, users) {
        state.onlineUsers = users
    },

    ADD_ONLINE_USER (state, user) {
        state.onlineUsers.unshift(user)
    },

    REMOVE_ONLINE_USER (state, user) {
        state.onlineUsers = state.onlineUsers.filter(u => u.email != user.email)
    },

    SET_USER_FAVORITE (state, userM) {
        state.users.data = state.users.data.map((user, index) => {
            if (user.email === userM.email)
                user.isMyFavorite = true

            return user
        })
    },

    REMOVE_USER_FAVORITE (state, userM) {
        state.users.data = state.users.data.map((user, index) => {
            if (user.email === userM.email)
                user.isMyFavorite = false

            return user
        })
    },

    CLEAR_TOTAL_UNREAD_MESSAGES (state, id) {
        state.users.data.map((user, index) => {
            if (user.id === id)
                user.unreadMessages = 0

            return user
        })
    },

    UPDATE_TOTAL_UNREAD_MESSAGES (state, id) {
        state.users.data.map((user, index) => {
            if (user.id === id)
                user.unreadMessages = parseInt(user.unreadMessages) + 1

            return user
        })
    }
}
