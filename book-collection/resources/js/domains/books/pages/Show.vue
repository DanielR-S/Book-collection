<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { storeModuleFactory } from '../../../services/store';

//books

const bookStore = storeModuleFactory('books');
bookStore.actions.getAll();
bookStore.getters.all;

const books = bookStore.getters.all;

//authors

// const authorStore = storeModuleFactory('authors');
// authorStore.actions.getAll();
// authorStore.getters.all;

// const authors = authorStore.getters.all;


const route = useRoute();
const router = useRouter();

// fetchBooks();

const book = bookStore.getters.getById(route.params.id);
// const author = authorStore.getters.getById(book.value.author_id);
const author = (book)


// const handleSubmit = async (data) => {
//   await bookStore.actions.update(data.id, { title: data.title, summary: data.summary, author_id: data.author_id  });
//   router.push({ name: 'books.overview' });
// };

</script>
<template>
    <!-- <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <br>
            <th>actions</th>
        </tr>
        <tr v-for="book in book" :key="book.id">
            <td>{{ book.title }}</td>
            <td>{{ book.summary }}</td>
            <td>
                <RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink>
            </td>
            <br>
            <td>
                <button @click="bookStore.actions.delete(book.id)">Verwijder</button>
            </td>
        </tr>
    </table> -->


    <p style="font-size: 25px;">title:</p>
    <strong><p style="font-size: 50px;">{{ book }}</p></strong>
    <p style="font-size: 25px;">summary:</p>
</template>