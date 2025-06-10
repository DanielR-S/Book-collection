<template>
    <div>
        <h2>Boek bewerken</h2>
        <Form v-if="book" :book="book" @submit="handleSubmit" />
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { fetchBooks, getBookById, updateBook } from '../store';
import { storeModuleFactory } from '../../../services/store';

const bookStore = storeModuleFactory('books');
bookStore.actions.getAll();
bookStore.getters.all;
// fetchAuthors();

const books = bookStore.getters.all;


const route = useRoute();
const router = useRouter();

// fetchBooks();

const book = bookStore.getters.getById(route.params.id);

const handleSubmit = async (data) => {
  await bookStore.actions.update(data.id, { title: data.title, summary: data.summary, author_id: data.author_id  });
  router.push({ name: 'books.overview' });
};

// const handleSubmit = async (data) => {
//     await updateBook(route.params.id, data);
//     router.push({ name: 'books.overview' });
// };
</script>