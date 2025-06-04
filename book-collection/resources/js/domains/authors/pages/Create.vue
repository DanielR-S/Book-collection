<template>
    <div>
        <h2>Nieuw boek toevoegen</h2>
        <Form :author="author" @submit="handleSubmit" />
    </div>
</template>

<script setup>
import Form from '../components/Form.vue';
import { createAuthor } from '../store';
import { useRouter } from 'vue-router';
import { ref } from 'vue';

const router = useRouter();

const author = ref({
    title: '',
    summary: '',
    author_id: null
});

const handleSubmit = async (data) => {
    await createAuthor(data);
    router.push({name: 'authors.overview'});
};
</script>