export default {
    sortedUsers (state) {
        let users = state.users.data
        const onlineUsers = state.onlineUsers

        // Sorted
        users = users.sort(user => {
            const index = onlineUsers.findIndex(u => u.email === user.email)
            return index === -1 ? 1 : -1;
        })

        // Map property online
        users = users.map(user => {
            const index = onlineUsers.findIndex(u => u.email === user.email)

            user.online = index != -1

            return user
        })

        return users
    }
}
