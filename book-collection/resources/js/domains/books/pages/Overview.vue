<script setup>
import { onMounted } from 'vue';
import { fetchBooks, getAllBooks, deleteBook} from '../store';


fetchBooks

console.log(fetchBooks());
</script>
<template>
    <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <br>
            <th>actions</th>
        </tr>
        <tr v-for="book in getAllBooks" :key="book.id">
            <td>{{ book.title }}</td>
            <td>{{ book.summary }}</td>
            <td>
                <RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink>
            </td>
            <br>
            <td>
                <button @click="deleteBook(book.id)">Verwijder</button>
            </td>
        </tr>
    </table>
</template>


