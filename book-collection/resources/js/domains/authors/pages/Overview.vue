<script setup>
import { onMounted } from 'vue';
import { storeModuleFactory } from '../../../services/store';
import { getMessage } from './../../../services/error';
import Message from '../../../services/error/Message.vue';

const authorStore = storeModuleFactory('authors');
authorStore.actions.getAll();

// fetchAuthors();

const authors = authorStore.getters.all;

const deleteAuthor = async (author) => {
    await authorStore.actions.delete(author.id);
}

</script>
<template>
    <Message />
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
                <button @click="deleteAuthor(author)">Verwijder</button>
            </td>
        </tr>
    </table>
</template>