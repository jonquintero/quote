<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" :href="route('dashboard')">
        <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
      </Link>
    </div>

     <div class="mb-4">
          <Link class="group flex items-center py-3" :href="route('insurance-quote.index')">
              <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('insurance-quote.index') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
              <div :class="isUrl('insurance-quote.index') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">My Quotes</div>
          </Link>
      </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
