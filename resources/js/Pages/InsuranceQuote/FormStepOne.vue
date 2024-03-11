<template>
    <template v-if="!showSecondForm && !showThreeForm">
        <div>
            <Head title="Main" />
            <div class="grid grid-cols-2 items-center justify-center p-6 min-h-screen bg-indigo-800">
                <div class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden relative" style="height: 69%">
                    <img :src="'/images/imagen_copia.jpg'" alt="Cars" class="h-full w-full object-cover">
                </div>
                <div>
                    <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="submitForm">
                        <div class="px-10 py-12">
                            <h1 class="text-center text-3xl font-bold">Let's get started!</h1>
                            <p class="text-center text-sm">Please select one or more options below that you'd like to have a quote for insurance.</p>

                            <div v-for="option in options" :key="option.value" class="flex items-center mt-4 mb-4 rounded-lg bg-gray-100 px-4 py-2">
                                <input :id="'default-checkbox' + option.value" type="checkbox" v-model="form.selectedOptions" :value="option.value" class="w-4 h-4 text-blue-600 bg-transparent border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label :for="'default-checkbox' + option.value" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center">
                                    <img :src="option.icon" :alt="option.label" class="w-4 h-4 mr-2">
                                    {{ option.label }}
                                </label>
                            </div>
                        </div>
                        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
                            <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Agree and Continue</loading-button>
                        </div>
                        <div>
                            <p class="text-center text-sm mt-4 mb-4">Please select one or more options below that you'd like to have a quote for insurance.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
    <template v-if="showSecondForm && !showThreeForm">
        <FormStepTwo :form-data="formDataToPass"/>
    </template>
</template>

<script setup>
import {defineProps, ref} from 'vue'
import { useForm, Head } from '@inertiajs/vue3'
import LoadingButton from '@/Shared/LoadingButton.vue'
import FormStepTwo from '@/Pages/InsuranceQuote/FormStepTwo.vue'

const options = [
    { value: 1, label: 'Home', icon: '/images/home.png' },
    { value: 2, label: 'Auto', icon: '/images/auto.png' },
    { value: 3, label: 'Recreational Vehicle', icon: '/images/auto.png' },
];
const props = defineProps({
    formData: {
        type: Object,
    },
});

const form = useForm({
    selectedOptions: props.formData ? props.formData.selectedOptions || [] : [],
    first_name: props.formData && props.formData.first_name ? props.formData.first_name : null,
    last_name: props.formData && props.formData.last_name ? props.formData.last_name : null,
    email: props.formData && props.formData.email ? props.formData.email : null,
    phone: props.formData && props.formData.phone ? props.formData.phone : null,
    contact_preference: props.formData && props.formData.contact_preference ? props.formData.contact_preference : null,

});



const showFirstForm = ref(true);
const showSecondForm = ref(false);
const showThreeForm = ref(false);
const formDataToPass = props.formData ? props.formData : form
function submitForm() {
    if (form.selectedOptions.length > 0) {


        showSecondForm.value = true;
        showThreeForm.value = false;
        showFirstForm.value = false;
    } else {
        alert("Select a least one option");
    }
}

function handleFormData(formData) {
      $emit('form-data', formData);
}
</script>
