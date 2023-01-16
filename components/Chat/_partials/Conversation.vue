<template>
  <div class="chat-window is-active">
    <div class="chat-window__wrapper">
      <!-- chat header -->
      <div
        class="chat-window__header bg-white px-6 py-2 h-20 flex md:items-center justify-between border-b-2 border-gray-200"
      >
        <div class="flex items-center space-x-4">
          <div
            class="cursor-pointer lg:pointer-events-none rounded-full flex items-center hover:bg-gray-100 pl-2"
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
              src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
              alt=""
              class="w-10 h-10 rounded-full"
            />
          </div>
          <div class="flex flex-col leading-tight">
            <div class="mt-1 flex items-center">
              <span class="text-lg font-medium text-gray-700 mr-3">{{
                "Carlos Ferreira"
              }}</span>
            </div>
            <span class="text-sm text-muted">Junior Developer</span>
          </div>
        </div>
        <div class="flex items-center space-x-2">
          <button
            type="button"
            class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-6 w-6"
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
      <div class="chat-window__messages-wrapper">
        <!-- chat msgs  -->
        <div class="chat-window__messages-inner">
          <div class="chat-messages">
            <div class="his-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>Hey How are you today?</div>
                </div>
              </div>
            </div>
            <div class="his-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Vel ipsa commodi illum saepe numquam maxime asperiores
                    voluptate sit, minima perspiciatis.
                  </div>
                </div>
              </div>
            </div>
            <div class="my-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>I'm ok what about you?</div>
                </div>
              </div>
            </div>
            <div class="my-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                  </div>
                </div>
              </div>
            </div>
            <div class="his-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>Lorem ipsum dolor sit amet !</div>
                </div>
              </div>
            </div>
            <div class="my-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                  </div>
                </div>
              </div>
            </div>
            <div class="his-message">
              <div class="inner">
                <div class="profile">
                  <img
                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt=""
                    class="w-10 h-10 rounded-full"
                  />
                </div>
                <div class="ballon-text">
                  <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perspiciatis, in.
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                  type="text"
                  class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                />
              </div>
            </div>
            <div class="ml-4">
              <button
                class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0"
              >
                <span>Enviar</span>
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
export default {};
</script>
