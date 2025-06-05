<script setup>
import { onMounted } from 'vue';
import { fetchAuthors, getAllAuthors, deleteAuthor } from '../store';
import { fetchBooks, getAllBooks } from '../../books/store';
import { storeModuleFactory } from '../../../services/store';

const authorStore = storeModuleFactory('authors');
authorStore.actions.getAll();

// fetchAuthors();

const authors = authorStore.getters.all;

</script>
<template>
    <table>
        <tr>
            <th>Name</th>
            <br>
            <th>actions</th>
        </tr>
        <tr v-for="author in authors" :key="author.id">
            <td>{{ author.name }}</td>
                        <td>
                <RouterLink :to="{ name: 'authors.edit', params: { id: author.id } }">Bewerk</RouterLink>
            </td>
            <br>
            <td>
                <button @click="deleteAuthor(author.id)">Verwijder</button>
            </td>
        </tr>
    </table>
</template>