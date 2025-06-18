<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { authorStore } from '../../authors/store';
import { reviewStore } from '../../reviews/store';
import { bookStore } from '../store';
import Form from '../../reviews/components/Form.vue';

const route = useRoute();
const router = useRouter();

// const bookStore = storeModuleFactory('books');
// const authorStore = storeModuleFactory('authors');


const book = ref({});
const author = ref({});
const reviews = ref({});

onMounted(async () => {
    //books
    await bookStore.actions.getAll();
    book.value = bookStore.getters.getById(route.params.id).value;

    //authors
    await authorStore.actions.getAll();
    author.value = authorStore.getters.getById(book.value.author_id).value;

    await reviewStore.actions.getAll();
    reviews.value = reviewStore.getters.byBookId(book.value.id).value;
});


// const deleteReview = async (review) => {
//     await reviewStore.actions.delete(review.id);
// }


// const deleteAuthor = async (author) => {
//     await authorStore.actions.delete(author.id);
// }

// const author = "Scape Goat";
// const author = (book)


// const handleSubmit = async (data) => {
//   await bookStore.actions.update(data.id, { title: data.title, summary: data.summary, author_id: data.author_id  });
//   router.push({ name: 'books.overview' });
// };

const handleSubmit = async (data) => {
    data.book_id = route.params.id;
    await reviewStore.actions.create(data);
    router.push({name: 'books.overview'});
};

const deleteReview = async (review) => {
    await reviewStore.actions.delete(review.id);
}

</script>
<template>
    <p style="font-size: 25px;">Author:</p>
    <strong><p style="font-size: 50px; color:brown;">{{ author.name }}</p></strong>

    <p style="font-size: 25px;">title:</p>
    <strong><p style="font-size: 35px; color:lightskyblue;">{{ book.title }}</p></strong>

    <p style="font-size: 25px;">summary:</p>
    <strong><p>{{ book.summary }}</p></strong>
   
<strong><p style="font-size: 50px;">reviews</p></strong>
        <p style="font-size: 10px;">verwijder functie werkt (herfris de pagina)</p>
        <br>


        <Form v-if="reviews" :review="reviews" @submit="handleSubmit" />


<table>     
       <tr>
            <th>Content</th>
            <th>actions</th>
        </tr>
        <tr v-for="review in reviews" :key="review.id">

            <td>{{ review.content }}</td>
            <!-- <td>
                <RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink>
            </td> -->
            <br>
            <td>
                <button @click="deleteReview(review)">Verwijder</button>
            </td>
            <br>
            <td>
                <RouterLink :to="{ name: 'reviews.edit', params: { id: review.id } }">Bewerk</RouterLink>
            </td>
        </tr>
</table>

</template>
