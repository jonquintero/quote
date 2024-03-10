<template>
    <layout>
      <div>
        <Head :title="`${form.name}`" />
        <div class="flex justify-start mb-8 max-w-3xl">
          <h1 class="text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" :href="route('users.index')">Users</Link>
            <span class="text-indigo-400 font-medium">/</span>
            {{ form.name }}
          </h1>
        </div>
        <trashed-message v-if="props.user.deleted_at" class="mb-6" @restore="restore"> This user has been deleted. </trashed-message>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
          <form @submit.prevent="form.put(route('users.update', props.user))">
            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
              <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-12 w-full lg:w-1/2" label="Name" />
              <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" />
              <text-input v-model="form.password" :error="form.errors.password" class="pb-8 pr-6 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password" />
            </div>
            <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
              <button v-if="!props.user.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="form.delete(route('users.destroy', props.user))">Delete User</button>
              <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update User</loading-button>
            </div>
          </form>
        </div>
  </div>
    </layout>
</template>

<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3'

import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TrashedMessage from "@/Shared/TrashedMessage.vue";


const props = defineProps({
    user: Object,
})

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '',
})

const restore = () => {
    if (confirm('Are you sure you want to restore this user?')) {
        router.put(`/users/${props.user.id}/restore`)
    }
}

</script>
