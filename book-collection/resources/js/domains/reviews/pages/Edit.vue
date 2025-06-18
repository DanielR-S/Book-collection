<template>
    <div>
        <h2>comment bewerken</h2>
        <Form v-if="review" :review="review" @submit="handleSubmit" />
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { reviewStore } from '../store';

reviewStore.actions.getAll();

const reviews = reviewStore.getters.all;

const route = useRoute();
const router = useRouter();

const review = reviewStore.getters.getById(route.params.id);

const handleSubmit = async (data) => {
  await reviewStore.actions.update(data.id, { content: data.content, book_id: data.book_id  });
  router.push({ name: 'books.overview' });
};

// const handleSubmit = async (data) => {
//     await updateBook(route.params.id, data);
//     router.push({ name: 'books.overview' });
// };
</script>