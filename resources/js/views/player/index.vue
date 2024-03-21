<template>
    <div>
      <h1>REPRODUCTOR</h1>
      <div v-if="film && film.media.length > 0">
        <video controls :src= "film.media[1].original_url ? film.media[1].original_url:  ''"  :alt="film.name" style="max-height: 500px;"></video>
      </div>
      <div v-else>
        <p>No se encontró ningún video para esta película.</p>
      </div>
    </div>
  </template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const route = useRouter();
const filmId = route.params.id;
const film = ref(null);

// Función para cargar los datos de la película
const loadFilmData = async () => {
  try {
    const response = await axios.get(`/api/films/${filmId}`);
    film.value = response.data;
  } catch (error) {
    console.error('Error fetching film data:', error);
  }
};

// Cargar los datos de la película cuando se monte el componente
onMounted(() => {
  loadFilmData();
});
</script>