<template>
    <template v-if="!showFirstForm && !showSecondForm">
        <div>
            <Head title="Main" />
            <div class="grid grid-cols-2 items-center justify-center p-6 min-h-screen bg-indigo-800">
                <div class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden relative" style="height: 96%">
                    <img :src="'/images/imagen_copia.jpg'" alt="Cars" class="h-full w-full object-cover">
                </div>
                <div class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
                    <form @submit.prevent="submitForm">
                        <div class="px-10 py-12">
                            <h1 class="text-center text-3xl font-bold">Address Information</h1>
                            <p class="text-center text-sm">We can help with that! What is your address</p>
                            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                <text-input v-model="form.street_address" :error="form.errors.street_address" class="pb-8 pr-6 w-full lg:w-1/2" label="Enter street address" required />
                                <text-input v-model="form.ste_apt" :error="form.errors.ste_apt" class="pb-8 pr-6 w-full lg:w-1/2" label="Ste/Apt" required/>
                                <text-input v-model="form.city" :error="form.errors.city" class="pb-8 pr-6 w-full" label="City" required />

                                <select-input v-model="form.state" :error="form.errors.state" class="pb-8 pr-6 w-full" label="State" required>
                                    <option disabled selected value="">Please select</option>
                                    <option v-for="contact in contact_preferences" :value="contact">{{ contact }}</option>
                                </select-input>
                                <text-input v-model="form.zipcode" :error="form.errors.zipcode" class="pb-8 pr-6 w-full" label="Zip Code" required />

                            </div>
                            <div class="flex justify-center px-10 py-4 bg-gray-100 border-t border-gray-100">
                                <loading-button :loading="form.processing" class="btn-indigo" type="submit">Continue</loading-button>
                            </div>

                        </div>
                    </form>
                    <div class="flex justify-center px-10 py-4 bg-gray-100 border-t border-gray-100">
                        <loading-button :loading="form.processing" class="btn-indigo" type="button" @click="goBack">Back</loading-button>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <template v-if="!showFirstForm && showSecondForm">
        <FormStepTwo :form-data="formData"/>
    </template>
</template>

<script setup>
import { reactive, ref, defineProps } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TextInput from '@/Shared/TextInput.vue'
import SelectInput from '@/Shared/SelectInput.vue'
import FormStepTwo from "@/Pages/InsuranceQuote/FormStepTwo.vue";

const contact_preferences = ['Email', 'Phone']

const props = defineProps({
    formData: {
        type: Object,
    },
});

const showFirstForm = ref(false);
const showSecondForm = ref(false);
const showThirdForm = ref(true);

const form = useForm({
    first_name: props.formData && props.formData.first_name ? props.formData.first_name : null,
    last_name: props.formData && props.formData.last_name ? props.formData.last_name : null,
    email: props.formData && props.formData.email ? props.formData.email : null,
    phone: props.formData && props.formData.phone ? props.formData.phone : null,
    contact_preference: props.formData && props.formData.contact_preference ? props.formData.contact_preference : null,
    selectedOptions: ref(props.formData ? props.formData.selectedOptions || [] : []),

    street_address: null,
    ste_apt: null,
    city: null,
    state: null,
    zipcode: null,

})

function submitForm() {
    form.post(route("insurance-quote.store"))

}

function goBack() {
    showSecondForm.value = true;
}


</script>
