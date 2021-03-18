<template>
    <div>
        <router-link :to="{name: 'home'}">Home</router-link>
        <router-link :to="{name: 'favorites'}">Favoritos</router-link>
        <router-link :to="{name: 'profile'}">Perfil</router-link>

        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
