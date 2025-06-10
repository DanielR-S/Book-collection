<template>
    <div>
        <h2>author bewerken</h2>
        <Form v-if="author" :author="author" @submit="handleSubmit" />
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
// import { fetchAuthors, getAuthorById, updateAuthor } from '../store';
import { storeModuleFactory } from '../../../services/store';

const authorStore = storeModuleFactory('authors');
authorStore.actions.getAll();
authorStore.getters.all;
// fetchAuthors();

const authors = authorStore.getters.all;

const route = useRoute();
const router = useRouter();

const author = authorStore.getters.getById(route.params.id);

const handleSubmit = async (data) => {
  await authorStore.actions.update(data.id, { name: data.name });
  router.push({ name: 'authors.overview' });
};


// const handleSubmit = async (id, data) => {
//     await authorStore.actions.update(author, { name: data});
//     router.push({ name: 'authors.overview' });
// };



// const handleSubmit = async (data) => {
//     console.log(data);
//     await authorStore.actions.update(id, { name: data});
//     router.push({ name: 'authors.overview' });
// };
</script>