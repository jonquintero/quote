<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/">
        <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
      </Link>
    </div>

    <div class="mb-4">
      <Link class="group flex items-center py-3" :href="route('users.index')">
        <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('users') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('users') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Users</div>
      </Link>
    </div>
      <div class="mb-4">
          <Link class="group flex items-center py-3" :href="route('clients.index')">
              <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('clients') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
              <div :class="isUrl('clients') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Clients</div>
          </Link>
      </div>
      <div class="mb-4">
          <Link class="group flex items-center py-3" :href="route('invoices.index')">
              <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('invoices') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
              <div :class="isUrl('invoices') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Invoices</div>
          </Link>
      </div>
      <div class="mb-4">
          <Link class="group flex items-center py-3" :href="route('unit-of-measurements.index')">
              <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
              <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Unit of Measurement</div>
          </Link>
      </div>
      <div class="mb-4">
          <Link class="group flex items-center py-3" :href="route('client-categories.index')">
              <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('client-categories') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
              <div :class="isUrl('client-categories') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Client Categories</div>
          </Link>
      </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" :href="route('client-groups.index')">
        <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('client-groups') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('client-groups') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Client Groups</div>
      </Link>
    </div>
      <div class="mb-4">
          <Link class="group flex items-center py-3" :href="route('products.index')">
              <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('products.index') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
              <div :class="isUrl('products.index') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Products</div>
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
