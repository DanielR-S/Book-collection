<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { storeModuleFactory } from '../../../services/store';
import { getRequest } from '../../../services/http';

const route = useRoute();
const router = useRouter();

const bookStore = storeModuleFactory('books');
const authorStore = storeModuleFactory('authors');
const reviewStore = storeModuleFactory('reviews');

reviewStore.actions.getByBookId = async(bookId) => {
    const { data } = await getRequest(`books/${bookId}/reviews`);
    if (!data) return;
    reviewStore.setters.setAll(data);
}

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

    await reviewStore.actions.getByBookId(book.id);
    reviews.value = reviewStore.getters.getById(book.id).value;
});

// const author = "Scape Goat";
// const author = (book)


// const handleSubmit = async (data) => {
//   await bookStore.actions.update(data.id, { title: data.title, summary: data.summary, author_id: data.author_id  });
//   router.push({ name: 'books.overview' });
// };

</script>
<template>
    <p style="font-size: 25px;">Author:</p>
    <strong><p style="font-size: 50px; color:brown;">{{ author.name }}</p></strong>

    <p style="font-size: 25px;">title:</p>
    <strong><p style="font-size: 35px; color:lightskyblue;">{{ book.title }}</p></strong>

    <p style="font-size: 25px;">summary:</p>
    <strong><p>{{ book.summary }}</p></strong>
   
<strong><p style="font-size: 50px;">reviews</p></strong>

<!-- <form action="{{ route('review.store', $article->id) }}" method="POST">
    <input>
</form> -->

<table>     
       <tr>
            <th>Content</th>
        </tr>
        <tr v-for="review in reviews" :key="review.id">

            <td>{{ review.content }}</td>
            <!-- <td>
                <RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink>
            </td> -->
            <br>
            <td>
                <button @click="reviewStore.actions.delete(review.id)">Verwijder</button>
            </td>
        </tr>
</table>

</template>
