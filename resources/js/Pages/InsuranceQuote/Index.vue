<template>
  <div>
    <Head title="My Quotes" />
    <h1 class="mb-8 text-3xl font-bold">My Quotes</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">

        <label class="block mt-4 text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>

    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Contact preference</th>
          <th class="pb-4 pt-6 px-6">Street address</th>
          <th class="pb-4 pt-6 px-6">Ste apt</th>
            <th class="pb-4 pt-6 px-6">City</th>
            <th class="pb-4 pt-6 px-6">State</th>
            <th class="pb-4 pt-6 px-6">Zipcode</th>

        </tr>
        <tr v-for="insuranceQuote in insuranceQuotes" :key="insuranceQuote.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/insurance-quote/${insuranceQuote.id}`">
              {{ insuranceQuote.contact_preference }}
              <icon v-if="insuranceQuote.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/insurance-quote/${insuranceQuote.id}`" tabindex="-1">
              {{ insuranceQuote.street_address }}
            </Link>
          </td>
            <td class="border-t">
                <Link class="flex items-center px-6 py-4" :href="`/insurance-quote/${insuranceQuote.id}`" tabindex="-1">
                    {{ insuranceQuote.ste_apt }}
                </Link>
            </td>
            <td class="border-t">
                <Link class="flex items-center px-6 py-4" :href="`/insurance-quote/${insuranceQuote.id}`" tabindex="-1">
                    {{ insuranceQuote.city }}
                </Link>
            </td>
            <td class="border-t">
                <Link class="flex items-center px-6 py-4" :href="`/insurance-quote/${insuranceQuote.id}`" tabindex="-1">
                    {{ insuranceQuote.state }}
                </Link>
            </td>
            <td class="border-t">
                <Link class="flex items-center px-6 py-4" :href="`/insurance-quote/${insuranceQuote.id}`" tabindex="-1">
                    {{ insuranceQuote.zipcode }}
                </Link>
            </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/insurance-quote/${insuranceQuote.id}`" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="insuranceQuotes.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No quotes found.</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout.vue'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import SearchFilter from '@/Shared/SearchFilter.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    insuranceQuotes: Array,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/insurance-quote', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
