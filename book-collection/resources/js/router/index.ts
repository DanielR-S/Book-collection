import { createRouter, createWebHistory } from 'vue-router';
import { bookRoutes } from '../domains/books/routes';
import { authorRoutes } from '../domains/authors/routes';
import axios from 'axios';

export const router = createRouter({
    history: createWebHistory(),
    routes: [...bookRoutes, ...authorRoutes], 
});