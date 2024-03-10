<template>
    <div>
        <FormStepOne v-if="currentStep === 1" @form-data="handleFormData" @next-step="nextStep" />
        <FormStepTwo v-else-if="currentStep === 2" :selectedOptions="selectedOptions" @prev-step="prevStep" @form-data="handleFormData" />
    </div>
</template>

<script>
import FormStepOne from "@/Pages/InsuranceQuote/FormStepOne.vue";
import FormStepTwo from "@/Pages/InsuranceQuote/FormStepTwo.vue";

export default {
    components: {
        FormStepOne,
        FormStepTwo,
    },
    data() {
        return {
            currentStep: 1,
            selectedOptions: [],
        };
    },
    methods: {
        handleFormData(formData) {
            this.selectedOptions = formData.selectedOptions;
        },
        nextStep() {
            this.currentStep += 1;
        },
        prevStep() {
            this.currentStep -= 1;
        },
    },
};
</script>
