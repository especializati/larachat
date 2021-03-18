<template>
    <div class="chat-container relative">
        <users :all-users="allUsers" :title="'Favoritos'"></users>
        <conversation></conversation>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

import Users from '../components/Chat/Users'
import Conversation from '../components/Chat/Conversation'

export default {
    mounted() {
        if (this.allUsers.length === 0)
            this.getMyFavorites();
    },

    computed: {
        ...mapState({
            allUsers: (state) => state.me.favorites
        }),
    },

    methods: {
        ...mapActions(["getMyFavorites"]),
    },

    components: {
        Users,
        Conversation,
    }
}
</script>
