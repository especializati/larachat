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
        getMyFavorites ({ commit }) {
            return axios.get('/api/v1/favorites')
                        .then(response => commit('SET_MY_FAVORITES', response.data.data))
        },

        setNewFavorite ({commit, dispatch, state}, user) {
            return axios.post('/api/v1/favorites', {user: user.id})
                        .then(response => {
                            commit('SET_USER_FAVORITE', user)

                            if (state.favorites.length > 0)
                                dispatch('getMyFavorites')
                        })
        },

        removeFavorite ({commit, dispatch, state}, user) {
            return axios.delete('/api/v1/favorites', {data: {
                user: user.id
            }})
            .then(response => {
                commit('REMOVE_USER_FAVORITE', user)

                if (state.favorites.length > 0)
                    dispatch('getMyFavorites')
            })
        }
    }
}
