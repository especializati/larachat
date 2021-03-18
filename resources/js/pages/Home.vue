<template>
    <div class="chat-container relative">
        <users :all-users="allUsers" :title="'Usuários'"></users>
        <conversation></conversation>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

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
