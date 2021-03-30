<template>
    <div class="chat-container relative" :class="{'has-oppened' : hasUserChat}">
        <users :all-users="allUsers" :title="'Usuários'"></users>
        <conversation></conversation>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapState } from 'vuex'

import Users from '../components/Chat/Users'
import Conversation from '../components/Chat/Conversation'

export default {
    mounted() {
        // if (this.allUsers.length === 0)
        this.getUsers();
    },

    computed: {
        ...mapGetters({
            allUsers: 'sortedUsers',
        }),

        ...mapState({
            userConversation: (state) => state.chat.userConversation,
        }),

        hasUserChat () {
            return this.userConversation != null
        }
    },

    methods: {
        ...mapActions(["getUsers"]),
    },

    components: {
        Users,
        Conversation,
    }
}
</script>
