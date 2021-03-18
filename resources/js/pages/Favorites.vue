<template>
    <div class="chat-container relative">
        <users :all-users="allUsers" :title="'Favoritos'"></users>
        <conversation></conversation>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

import Users from '../components/Chat/Users'
import Conversation from '../components/Chat/Conversation'

export default {
    mounted() {
        // this.getUsers();
    },

    computed: {
    },

    data() {
        return {
            allUsers: []
        }
    },

    methods: {
        //...mapActions(["getUsers"]),
    },

    components: {
        Users,
        Conversation,
    }
}
</script>
