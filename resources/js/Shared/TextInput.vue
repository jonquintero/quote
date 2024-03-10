<template>
    <div :class="$attrs.class">
        <label v-if="props.label" class="block text-sm font-medium leading-6 text-gray-900" :for="props.id">{{ props.label }}:</label>
        <input :id="props.id" ref="inputRef" v-bind="{ ...$attrs, class: null }" class="input" :class="{ error: props.error }" :type="props.type" :value="props.modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        <div v-if="props.error" class="input-error">{{ props.error }}</div>
    </div>
</template>

<script setup>
import { v4 as uuid } from 'uuid';
import { defineProps, ref, onMounted } from 'vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `text-input-${uuid()}`,
    },
    type: {
        type: String,
        default: 'text',
    },
    error: String,
    label: String,
    modelValue: String,
});

const inputRef = ref(null);

function focus() {
    inputRef.value?.focus();
}

function select() {
    inputRef.value?.select();
}

function setSelectionRange(start, end) {
    inputRef.value?.setSelectionRange(start, end);
}

onMounted(() => {
    focus();
});
</script>
