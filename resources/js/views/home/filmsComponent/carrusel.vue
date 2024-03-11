<style scope>

</style>

<script setup>

</script>

<template>
     <h2>{{ category.name }}</h2>
      <div class="scrolling-buttons-container p-0 m-0">
          <span id="scrolling-button-left">👈</span>
          <span id="scrolling-button-right">👉</span>
      </div>
      <div id="scrollCont" class="scrolling-container p-0">
          <div class="scrolling-card" v-for="film in films" :key="film.id">
            <img @click="handleImageClick(film.id)" :id="film.id" class="image-item"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="248" :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
          </div>
      </div>
</template>