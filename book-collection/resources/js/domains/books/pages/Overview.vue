<script setup>
import { onMounted } from 'vue';
// import { fetchBooks, getAllBooks, deleteBook} from '../store';
import { getMessage } from './../../../services/error';
import Message from '../../../services/error/Message.vue';
import { bookStore } from '../store';

bookStore.actions.getAll();

const deleteBook = async (book) => {
    await bookStore.actions.delete(book.id);
}

const books = bookStore.getters.all;
</script>
<template>
<strong><p style="color:green">Tip: Click on a books title to see more info!!</p></strong>
<Message/>
    <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <br>
            <th>actions</th>
        </tr>
        <tr v-for="book in books" :key="book.id">
            <RouterLink :to="{ name: 'books.show', params: { id: book.id } }"><td>{{ book.title }}</td></RouterLink>
            <td>{{ book.summary }}</td>
            <td>
                <RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink>
            </td>
            <br>
            <td>
                <button @click="bookStore.actions.delete(book.id);">Verwijder</button>
            </td>
        </tr>
    </table>
</template>


