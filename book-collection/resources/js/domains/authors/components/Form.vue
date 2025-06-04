<template>
    <form @submit.prevent="handleSubmit">
        <label>Name:</label>
        <input v-model="form.name" type="text" required />
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup>
import { ref } from 'vue';

// Fetch authors when component is mounted

const props = defineProps({ author: Object });

const emit = defineEmits(['submit']);

const form = ref({ ...props.author });

const handleSubmit = () => emit('submit', form.value);
</script>