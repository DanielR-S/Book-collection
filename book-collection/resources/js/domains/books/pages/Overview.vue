<script setup>
import { onMounted } from 'vue';
import { fetchBooks, getAllBooks, deleteBook} from '../store';
import { storeModuleFactory } from '../../../services/store';

const bookStore = storeModuleFactory('books');
bookStore.actions.getAll();

// fetchAuthors();

const books = bookStore.getters.all;
</script>
<template>
    <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <br>
            <th>actions</th>
        </tr>
        <tr v-for="book in books" :key="book.id">
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
    </table>
</template>


