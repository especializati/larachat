<template>
    <div class="md:grid md:grid-cols-1 md:gap-6 p-8 overflow-y-auto" style="max-height: 100vh;">
        <div class="bg-white p-8 shadow sm:rounded-md sm:overflow-hidden">
            <span v-if="me.photo === ''" class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </span>
            <div v-else class="inline-block">
                <img :src="me.photo" :alt="me.name" class="h-12 w-12 rounded-full">
            </div>

            <div class="inline-block">
                <input type="file" class="p-6" @change="updatePhoto">
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
            <div class="p-6">
                <div class="col-span-6 sm:col-span-4 py-2">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input v-model="me.name" type="text" name="name" id="name" autocomplete="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                </div>
                <div class="col-span-6 sm:col-span-4 py-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input  v-model="me.email" type="text" name="email" id="email" autocomplete="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" disabled>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                @click.prevent="updateProfile"
                type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Atualizar
              </button>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
            <div class="p-6">
                <div class="col-span-6 sm:col-span-4 py-2">
                    <label for="notifications">
                        <input @change="toogleNotify" v-model="me.preference.me_notify" type="checkbox" name="me_notify" id="me_notify" autocomplete="email" class="px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        Receber Notificações?
                    </label>
                </div>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
            <div class="p-6">
                <div class="col-span-6 sm:col-span-4 py-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Atualizar Background</label>
                    <input @change="updateBackgroundChat" type="file" name="image_chat" id="image_chat" autocomplete="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                </div>
            </div>
            <div v-if="me.preference.background_chat" class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                @click.prevent="removeImageChat"
                type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Remover Imagem do Chat
              </button>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
            <div class="p-6">
                <div class="col-span-6 sm:col-span-4 py-2">
                    <button :disabled="isLogouting" @click="logoutNow" class="w-full h-12 px-6 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">
                        <span v-if="isLogouting">Saindo</span>
                        <span v-else>Sair</span>
                    </button>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
    computed: {
        ...mapState({
            me: (state) => state.me.me
        })
    },

    data() {
        return {
            isLogouting: false,
        }
    },

    methods: {
        ...mapActions([
            'updatePhotoProfile',
            'update',
            'toogleNotify',
            'updateImageChat',
            'removeImageChat',
            'logout'
        ]),

        updatePhoto (e) {
            let files = e.target.files || e.dataTransfer.files
            if (files.length == 0) return

            const formData = new FormData()
            formData.append('image', files[0])

            this.updatePhotoProfile(formData)
        },

        updateProfile () {
            this.update({name: this.me.name})
        },

        updateBackgroundChat (e) {
            let files = e.target.files || e.dataTransfer.files
            if (files.length == 0) return

            const formData = new FormData()
            formData.append('image', files[0])

            this.updateImageChat(formData)
        },

        logoutNow () {
            this.isLogouting = true

            this.logout()
                    .then(response => window.location.reload())
                    .finally(() => this.isLogouting = false)
        }
    }
}
</script>
