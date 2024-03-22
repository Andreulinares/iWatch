<template>
    <div>
      <h1>REPRODUCTOR</h1>
      <div v-if="film && film.media && film.media.length > 0">
      <video controls :src="film.media[1] && film.media[1].original_url ? film.media[1].original_url : ''" :alt="film.name" style="max-height: 500px;"></video>
    </div>
      <div v-else>
        <p>No se encontró ningún video para esta película.</p>
      </div>
      {{ filmId }}
    </div>
  </template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const route = useRouter();
const filmId = ref(null);
const film = ref(null);

// Función para cargar los datos de la película
const loadFilmData = async () => {
  try {
    const response = await axios.get(`/api/films/${filmId.value}`);
    film.value = response.data;
  } catch (error) {
    console.error('Error fetching film data:', error);
  }
};

// Cargar los datos de la película cuando se monte el componente
onMounted(() => {
  // Cargar datos iniciales
  loadFilmData();
});

// Observar cambios en la ruta y cargar datos de la película en consecuencia
watch(() => route.currentRoute.params, (newValue, oldValue) => {
  if (newValue && newValue.id && newValue.id !== oldValue.id) {
    filmId.value = newValue.id;
    loadFilmData();
  }
});
</script>