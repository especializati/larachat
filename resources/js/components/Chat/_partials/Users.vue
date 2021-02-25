<template>
  <div class="chat-sidebar">
    <div class="px-8 lg:py-4 lg:px-6">
      <h3 class="text-xl font-semibold tracking-wide mt-5 hidden lg:block">
        Conversas
      </h3>
      <div class="relative my-5 text-gray-600">
        <input
          type="search"
          name="serch"
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
          class="bg-white hover:bg-gray-100 border-b p-4 cursor-pointer"
          :class="{ 'is-active': activeChat === index }"
        >
          <div class="flex items-center relative">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <span
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
                {{ user.label }}
              </span>
            </div>
            <time class="absolute top-0 right-0 text-xs font-medium text-muted"
              >22/02/2024</time
            >
            <span
              class="absolute bottom-0 right-0 text-xs font-medium bg-indigo-500 text-white text-circle"
              >3</span
            >
          </div>
        </li>
      </div>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selected: "inbox",
      activeChat: 0,
      users: [
        {
          id: 1,
          name: "Carlos",
          label: "Novas Mensagens",
        },
        {
          id: 2,
          name: "Outro User",
          label: "Novas Mensagens",
        },
      ],
    };
  },
};
</script>
