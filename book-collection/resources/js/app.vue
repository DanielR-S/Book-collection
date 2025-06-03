<template>
    <nav>
        <router-link :to="{name: 'books.overview'}">Boeken Overzicht</router-link> |
        <RouterLink :to="{name: 'books.create'}">Nieuw boek toevoegen</RouterLink> |
        <router-link :to="{name: 'authors.overview'}">Bekijk schrijvers</router-link> |
        <router-link :to="{name: 'books.create'}">Nieuw Boek</router-link> |
    </nav>
    <router-view></router-view>
</template>

      