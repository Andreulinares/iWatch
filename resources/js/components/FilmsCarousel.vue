<style scope>

</style>

<template>
     
      <div class="scrolling-buttons-container p-0 m-0">
          <span id="scrolling-button-left">👈</span>
          <span id="scrolling-button-right">👉</span>
      </div>
      <div id="scrollCont" class="scrolling-container p-0">
          <div class="scrolling-card" v-for="film in peliculas" :key="film.id">
            <img @click="handleImageClick(film.id)" :id="film.id" class="image-item"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="248" :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
            <p>{{ film.categoria_id }}</p>
          </div>
      </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  peliculas: Array // o el tipo adecuado para las películas
});


</script>