<template>
    <template v-if="!showFirstForm && !showThirdForm">
    <div>
        <Head title="Main" />
        <div class="grid grid-cols-2 items-center justify-center p-6 min-h-screen bg-indigo-800">
            <div class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden relative" style="height: 96%">
                <img :src="'/images/imagen_copia.jpg'" alt="Cars" class="h-full w-full object-cover">
            </div>
            <div class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
                <form @submit.prevent="submitForm">
                    <div class="px-10 py-12">
                        <h1 class="text-center text-3xl font-bold">Personal Information</h1>
                        <p class="text-center text-sm">Ok, Great! Before continue, please let us know how we can contact you regarding your quote</p>
                        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                            <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2" label="First Name" required />
                            <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last Name" required/>
                            <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full" label="Email Address" type="email" autofocus autocapitalize="off" required/>
                            <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full" label="Phone Number" required />
                            <select-input v-model="form.contact_preference" :error="form.errors.contact_preference" class="pb-8 pr-6 w-full" label="Contact Preference" required>
                                <option disabled selected value="">Please select</option>
                                <option v-for="contact in contact_preferences" :value="contact">{{ contact }}</option>
                            </select-input>
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
    <template v-if="showFirstForm && !showThirdForm">
        <FormStepOne :form-data="formData"/>
    </template>
    <template v-if="!showFirstForm && !showSecondForm">
        <FormStepThree :form-data="form"/>
    </template>
</template>

<script setup>
import { reactive, ref, defineProps } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TextInput from '@/Shared/TextInput.vue'
import SelectInput from '@/Shared/SelectInput.vue'
import FormStepOne from "@/Pages/InsuranceQuote/FormStepOne.vue";
import FormStepThree from "@/Pages/InsuranceQuote/FormStepThree.vue"

const contact_preferences = ['Email', 'Phone']



const showFirstForm = ref(false);
const showSecondForm = ref(true);
const showThirdForm = ref(false);

const props = defineProps({
    formData: {
        type: Object,
    },
});
const form = useForm({
    first_name: props.formData && props.formData.first_name ? props.formData.first_name : null,
    last_name: props.formData && props.formData.last_name ? props.formData.last_name : null,
    email: props.formData && props.formData.email ? props.formData.email : null,
    phone: props.formData && props.formData.phone ? props.formData.phone : null,
    contact_preference: props.formData && props.formData.contact_preference ? props.formData.contact_preference : null,
    selectedOptions: ref(props.formData ? props.formData.selectedOptions || [] : []),
});



function submitForm() {
    //form.post(route("insurance-quote.first.step"))
   // showThirdForm.value = true;
    form.post(route("insurance-quote.first.step"), {

        onSuccess: () => {

            showThirdForm.value = true;
            showFirstForm.value = false;
            showSecondForm.value = false;
        },
    });
}

const formData = reactive({
    first_name: form.first_name,
    last_name: form.last_name,
    email: form.email,
    phone: form.phone,
    contact_preference: form.contact_preference,
   // selectedOptions: ref(props.selectedOptions)
})

function goBack() {
    showFirstForm.value = true;
    showThirdForm.value = false;
    showSecondForm.value = false;
}


</script>
