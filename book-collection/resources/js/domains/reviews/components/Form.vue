<template>
    <form @submit.prevent="handleSubmit">
        <label>content:</label>
        <input v-model="form.content" required></input>
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup>
import { ref } from 'vue';
import { reviewStore } from '../store';
// import { fetchAuthors, getAllAuthors } from '../../authors/store';

// Fetch authors when component is mounted
// fetchAuthors();

const props = defineProps({ review: Object });

const emit = defineEmits(['submit']);

const form = ref({ ...props.review });

const handleSubmit = () => emit('submit', form.value);
</script>