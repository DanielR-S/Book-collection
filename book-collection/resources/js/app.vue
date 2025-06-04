<template>
    <nav>
        <router-link :to="{name: 'books.overview'}">Boeken Overzicht</router-link> |
        <router-link :to="{name: 'authors.overview'}">Bekijk schrijvers</router-link> |
        <router-link :to="{name: 'books.create'}">Nieuw Boek</router-link> |
        <router-link :to="{name: 'authors.create'}">Author toevoegen</router-link> |
        <!-- <router-link :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink> -->
    </nav>
    <router-view></router-view>
</template>

      