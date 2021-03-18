<template>
  <div class="chat-wrapper">
    <sidebar />
    <main class="chat-main relative bg-gray-100">
      <section class="chat-inbox w-full h-full is-active">
        <router-view></router-view>
      </section>
    </main>
  </div>
</template>

<script>
import Sidebar from "./_partials/Sidebar";

export default {
  components: {
    Sidebar,
  },
};
</script>
