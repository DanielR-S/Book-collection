import axios from 'axios';
import { ref, onMounted, computed } from 'vue';
import { getRequest, postRequest, putRequest, deleteRequest } from '../../services/http';

// state
const authors = ref([]);

// getters
export const getAllAuthors = computed(() => authors.value);

// actions
export const fetchAuthors = async () => {
    const {data} = await getRequest('/authors');
    if(!data) return;
    authors.value = data;
};

export const createAuthor = async (newAuthor) => {
    const {data} = await postRequest('/authors', newAuthor);
    if(!data) return
    authors.value = data;
};

export const getAuthorById = (id) => computed(() => authors.value.find(author => author.id == id));

export const updateAuthor = async (id, updatedAuthor) => {
    const { data } = await putRequest(`/authors/${id}`, updatedAuthor);
    if (!data) return;
    authors.value = data;
};

export const deleteAuthor = async (id) => {
    try {
        await deleteRequest(`/authors/${id}`);
        authors.value = authors.value.filter(author => author.id !== id);
    } catch(e) {
        alert(e.response.data.message);
    }
};