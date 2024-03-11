<template>
    <layout>
        <div>
            <Head title="quote" />
            <h1 class="mb-8 text-3xl font-bold">
                <Link class="text-indigo-400 hover:text-indigo-600" :href="route('insurance-quote.index')">My quotes</Link>
                <span class="text-indigo-400 font-medium">/</span> Quote
            </h1>
            <div class="max-w-5xl bg-white rounded-md shadow overflow-hidden">
                <form>
                    <div class="flex flex-wrap -mb-8 -mr-6 p-8">

                        <div class="w-full overflow-x-auto">
                            <div class="align-middle inline-block min-w-full overflow-x-auto">
                                <table class="min-w-full">

                                    <tbody>
                                    <tr>
                                        <td class="w-1/2">
                                            <p class="mb-4">Contact Preference: {{ insuranceQuote.contact_preference }}</p>
                                        </td>
                                        <td class="w-1/2">
                                            <p class="mb-4">Street address: {{ insuranceQuote.street_address }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/2">
                                            <p class="mb-4">Ste apt: {{ insuranceQuote.ste_apt }}</p>
                                        </td>
                                        <td class="w-1/2">
                                            <p class="mb-4">City: {{ insuranceQuote.city }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/2">
                                            <p class="mb-4">State: {{ insuranceQuote.state }}</p>
                                        </td>
                                        <td class="w-1/2">
                                            <p class="mb-4">Zipcode: {{ insuranceQuote.zipcode }}</p>
                                        </td>
                                    </tr>
                                    <tr v-for="quotes in insuranceQuote.insurance_quote_with_type_quotes">
                                        <td class="w-1/2">
                                            <p class="mb-4">Type Quote: {{ quotes.type_quote.name }}</p>
                                        </td>
                                        <td class="w-1/2">
                                            <p class="font-bold mb-2">Coverages</p>
                                            <ul class="list-disc ml-6">
                                                <li v-for="coverage in quotes.type_quote.type_quote_coverage" class="mb-2">
                                                    {{ coverage.name }}
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         </div>

                </form>
            </div>
        </div>
    </layout>
</template>

<script setup>
import {defineProps} from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Layout from '@/Shared/Layout.vue';


const props = defineProps({
    insuranceQuote: Object,

});



</script>
