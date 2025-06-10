<template>
    <div>
        <h2>Nieuw boek toevoegen</h2>
        <Form :author="author" @submit="handleSubmit" />
    </div>
</template>

<script setup>
import Form from '../components/Form.vue';
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { storeModuleFactory } from '../../../services/store';

const authorStore = storeModuleFactory('authors');
authorStore.actions.getAll();


const authors = authorStore.getters.all;
// const addBook = async () => {
//     await authorStore.actions.create({ name: 'Barthalomew' });
//     router.push({name: 'authors.overview'});
// };

const router = useRouter();

const author = ref({
    name: '',
});

const handleSubmit = async (data) => {
    await authorStore.actions.create(data);
    router.push({name: 'authors.overview'});
};
</script>