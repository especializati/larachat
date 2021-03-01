export default {
    getUsers ({ commit }) {
        return axios.get('/api/v1/users')
                        .then(response => commit('ADD_ALL_USERS', response.data));
    }
}
