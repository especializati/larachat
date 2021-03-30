<template>
  <div class="chat-sidebar overflow-y-auto">
    <div class="px-8 lg:py-4 lg:px-6">
      <h3 class="text-xl font-semibold tracking-wide mt-5 hidden lg:block">
        {{ title }}
      </h3>
      <div class="relative my-5 text-gray-600">
        <input
          type="search"
          name="serch"
          v-model="filter"
          placeholder="Search"
          class="w-full bg-gray-100 h-10 px-5 pr-10 rounded-full text-sm focus:outline-none focus:shadow-lg focus:bg-white hover:shadow-md"
        />
        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
          <svg
            class="h-4 w-4 fill-current"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            version="1.1"
            id="Capa_1"
            x="0px"
            y="0px"
            viewBox="0 0 56.966 56.966"
            style="enable-background: new 0 0 56.966 56.966"
            xml:space="preserve"
            width="512px"
            height="512px"
          >
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
            />
          </svg>
        </button>
      </div>
    </div>
    <!-- users -->
    <ul class="flex flex-col chat-list">
      <div v-for="(user, index) in users" :key="index">
        <li
          @click.prevent="openChatWithUser(user)"
          :class="['hover:bg-gray-100', 'border-b', 'p-4', 'cursor-pointer',
          activeChat === user.id ? 'is-active' : 'bg-white' ]"
        >
          <div class="flex items-center relative">
            <div class="relative">
              <img
                :src="[user.photo != '' ? user.photo : '/images/no-photo.png']"
                :alt="user.name"
                class="w-12 h-12 rounded-full"
              />
              <span
                v-if="user.online"
                class="text-green-500 absolute -bottom-0.5 -right-0.5 rounded-full bg-white border-white border-4"
              >
                <svg width="10" height="10">
                  <circle cx="5" cy="5" r="5" fill="currentColor"></circle>
                </svg>
              </span>
            </div>
            <div class="flex flex-col leading-tight mx-4">
              <div class="font-medium mb-1 flex items-center">
                <span class="text-gray-700 mr-3">{{ user.name }}</span>
              </div>
              <span class="text-sm text-truncate text-muted-alt">
                -
              </span>
            </div>
            <!-- <time class="absolute top-0 right-0 text-xs font-medium text-muted"
              >22/02/2024</time
            > -->
            <span
              v-show="user.unreadMessages > 0"
              class="absolute bottom-0 right-0 text-xs font-medium bg-indigo-500 text-white text-circle"
              >{{ user.unreadMessages }}</span
            >
          </div>
        </li>
      </div>
    </ul>
  </div>
</template>

<script>
import { mapActions, mapState, mapGetters, mapMutations } from "vuex";

export default {

  props: {
      allUsers: {
          require: true,
          type: Array,
      },
      title: {
          require: true,
          type: String
      }
  },

  computed: {

    users () {
        return this.allUsers.filter(user => {
            if (this.filter === '') return user;

            return user.name.includes(this.filter) || user.email === this.filter
        })
    }
  },

  data() {
    return {
      selected: "inbox",
      activeChat: null,
      filter: ''
    };
  },

  methods: {
    ...mapMutations({
        addUserChat: 'ADD_USER_CONVERSATION',
    }),
    ...mapActions(["getMessagesConversation"]),

    openChatWithUser (user) {
        this.activeChat = user.id

        this.addUserChat(user)

        this.getMessagesConversation()
    }
  },
};
</script>

<style scoped>
.chat-sidebar::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
.chat-sidebar::-webkit-scrollbar {
    width: 6px;
    background: #F4F4F4;
}
.chat-sidebar::-webkit-scrollbar-thumb {
    background: #dad7d7;
}
</style>
