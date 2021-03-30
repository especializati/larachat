<template>
  <div class="chat-window is-active" v-if="userConversation != null">
    <div class="chat-window__wrapper">
      <!-- chat header -->
      <div
        class="chat-window__header bg-white px-6 py-2 h-20 flex md:items-center justify-between border-b-2 border-gray-200"
      >
        <div class="flex items-center space-x-4">
          <div
            class="cursor-pointer lg:pointer-events-none rounded-full flex items-center hover:bg-gray-100 pl-2"
            @click="removeUserChat"
          >
            <span class="lg:hidden text-gray-500">
              <svg
                class="w-4 h-4 mr-2"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 19l-7-7m0 0l7-7m-7 7h18"
                ></path>
              </svg>
            </span>
            <img
              :src="[userConversation.photo != '' ? userConversation.photo : '/images/no-photo.png']"
              alt=""
              class="w-10 h-10 rounded-full"
            />
          </div>
          <div class="flex flex-col leading-tight">
            <div class="mt-1 flex items-center">
              <span class="text-lg font-medium text-gray-700 mr-3">{{
                userConversation.name
              }}</span>
            </div>
            <span class="text-sm text-muted">{{ userConversation.email }}</span>
          </div>
        </div>
        <div class="flex items-center space-x-2">
          <button
            type="button"
            @click.prevent="toogleFavorite"
            class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-6 w-6"
              :class="{'fill-current text-red-600' : userConversation != null && userConversation.isMyFavorite}"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      <div
        class="chat-window__messages-wrapper"
        :style="[
            me.preference.background_chat ?
            {'background-image' : `url('${me.preference.background_chat}')`}
            : '']">
        <!-- chat msgs  -->
        <div class="chat-window__messages-inner" ref="messages">
          <div class="chat-messages">
            <div
                v-for="(message, index) in messages"
                :key="index"
                :class="[message.me ? 'my-message' : 'his-message']">
              <div class="inner">
                <div class="profile" v-if="!message.me">
                  <img
                    :src="[message.sender.photo != '' ? message.sender.photo : '/images/no-photo.png']"
                    :alt="message.sender.name"
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>{{ message.message }}</div>
                </div>
              </div>
            </div>
          </div><!--chat-messages-->
        </div>
        <!-- footer envia mensagem -->
        <div class="chat-input w-full px-4 mb-4">
          <div class="flex flex-row items-center h-16 rounded-xl px-4 bg-white">
            <div>
              <button
                class="flex items-center justify-center text-gray-400 hover:text-gray-600"
              >
                <svg
                  class="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                  ></path>
                </svg>
              </button>
            </div>
            <div class="flex-grow ml-4">
              <div class="relative w-full">
                <input
                  v-model="message"
                  type="text"
                  v-on:keyup.enter="sendMessage"
                  class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                />
              </div>
            </div>
            <div class="ml-4">
              <button
                :disabled="disabledButton"
                type="submit"
                @click.prevent="sendMessage"
                class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0"
              >
                <span v-if="sendingMessage">Enviando...</span>
                <span v-else>Enviar</span>
                <span class="ml-2">
                  <svg
                    class="w-4 h-4 transform rotate-45 -mt-px"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                    ></path>
                  </svg>
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState, mapGetters, mapMutations } from "vuex";

export default {
    computed: {
        ...mapState({
            userConversation: (state) => state.chat.userConversation,
            messages: (state) => state.chat.messages,
            me: (state) => state.me.me,
        }),

        disabledButton () {
            return this.message.length < 2 || this.sendingMessage
        }
    },

    data() {
        return {
            message: '',
            sendingMessage: false
        }
    },

    methods: {
        ...mapActions([
            'sendNewMessage',
            'setNewFavorite',
            'removeFavorite',
        ]),

        ...mapMutations({
            removeUserChat: 'REMOVE_USER_CONVERSATION'
        }),

        scrollMessages () {
            setTimeout(() => {
                //this.$refs.messages.scrollTo(0, this.$refs.messages.scrollHeight)
                this.$refs.messages.scroll({
                    top: this.$refs.messages.scrollHeight,
                    lef: 0,
                    behavior: 'smooth'
                })
            }, 10)
        },

        sendMessage () {
            if (this.disabledButton) return;

            this.sendingMessage = true

            this.sendNewMessage(this.message)
                    .then(response => {
                        this.message = ''
                    })
                    .finally(() => this.sendingMessage = false)
        },

        toogleFavorite() {
            if (this.userConversation.isMyFavorite)
                return this.removeFavorite(this.userConversation)

            return this.setNewFavorite(this.userConversation)
        }
    },

    watch: {
        messages () {
            this.scrollMessages()
        }
    }
};
</script>

<style scoped>
.chat-window__messages-inner::-webkit-scrollbar-track {
    background-color: #dad7d7;
}
.chat-window__messages-inner::-webkit-scrollbar {
    width: 6px;
    background: #dad7d7;
}
.chat-window__messages-inner::-webkit-scrollbar-thumb {
    background: #3f51b5;
}
</style>
