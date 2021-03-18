<template>
    <div class="chat-container relative">
        <users></users>
        <conversation></conversation>
    </div>
</template>

<script>
import Users from '../components/Chat/Users'
import Conversation from '../components/Chat/Conversation'

export default {
    components: {
        Users,
        Conversation,
    }
}
</script>
