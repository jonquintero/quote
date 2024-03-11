<template>
  <Head title="Login" />
  <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-800">
    <div class="w-full max-w-md">

      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="form.post(route('login'))">
        <div class="px-10 py-12">
          <h1 class="text-center text-3xl font-bold">Welcome Back!</h1>
          <div class="mt-6 mx-auto w-24 border-b-2" />
          <text-input v-model="form.email" :error="form.errors.email" class="mt-10" label="Email" type="email" autofocus autocapitalize="off" />
          <text-input v-model="form.password" :error="form.errors.password" class="mt-6" label="Password (you email)" type="password" />

        </div>
        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
            <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Login</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm, Head } from '@inertiajs/vue3'
import Logo from "@/Shared/Logo.vue";
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'

const form = useForm({
    email: null,
    password: null,

})
</script>
