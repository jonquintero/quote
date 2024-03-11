<template>
  <Head title="Done" />
  <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-800">
    <div class="w-full max-w-md">
          <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="px-10 py-12">
          <h1 class="text-center text-3xl font-bold">Insurance Done!</h1>
          <div class="mt-6 mx-auto w-24 border-b-2" />
            <p class="text-center text-sm">If you want to see you quotes, Login with your email.  <Link class="text-indigo-400 hover:text-indigo-600" :href="route('login')">here</Link></p>



        </div>

      </form>
    </div>
  </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'

</script>
