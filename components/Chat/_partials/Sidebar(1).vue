<template>
    <aside class="chat-aside">
        <div class="px-2 lg:py-2"><img class="w-24 lg:w-full mx-auto" src="/images/content/logo-larachat.png"></div>
        <nav class="nav-tab">
          <a href="#inbox" :class="{ 'is-active': selected === 'inbox' }">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
              </path>
            </svg>
          </a>
          <a href="#favorites" :class="{ 'is-active': selected === 'favorites' }">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
              </path>
            </svg>
          </a>
          <a href="#contacts" :class="{ 'is-active': selected === 'contacts' }">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </a>
        </nav>
        <div class="text-center hidden lg:block">
        </div>
    </aside>
</template>

<script>
export default {
    data() {
        return {
            selected: 'inbox'
        }
    },
}
</script>
