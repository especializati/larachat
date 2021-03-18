import axios from "axios"

export default {
    state: {
        favorites: [],
    },

    mutations: {
        SET_MY_FAVORITES (state, users) {
            state.favorites = users
        },
    },

    actions: {
        getMyFavorites({ commit }) {
            return axios.get('/api/v1/favorites')
                        .then(response => commit('SET_MY_FAVORITES', response.data.data))
        }
    }
}
