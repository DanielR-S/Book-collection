<template>
    <div>
        <h2>Nieuw boek toevoegen</h2>
        <Form :book="book" @submit="handleSubmit" />
    </div>
</template>

<script setup>
import Form from '../components/Form.vue';
// import { createBook } from '../store';
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { storeModuleFactory } from '../../../services/store';

const bookStore = storeModuleFactory('books');
bookStore.actions.getAll();


const books = bookStore.getters.all;

const router = useRouter();

const book = ref({
    title: '',
    summary: '',
    author_id: null
});

const handleSubmit = async (data) => {
    await bookStore.actions.create(data);
    router.push({name: 'books.overview'});
};

</script>