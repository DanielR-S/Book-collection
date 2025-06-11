<template>
    <div v-if="getMessage">
        {{ getMessage }}
    </div>
</template>

<script setup lang="ts">
import { getMessage } from '.';

</script>