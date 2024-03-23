<template>
  <div>
    <h1>REPRODUCTOR</h1>
    <div v-if="isLoading">
      <p>Cargando...</p>
    </div>
    <div v-else-if="film && film.media && film.media.length > 0">
      <video controls :src= "film.media[1].original_url ? film.media[1].original_url : ''" :alt="film.name" style="max-height: 500px;"></video>
    </div>
    <div v-else>
      <p>No se encontró ningún video para esta película.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';

const route = useRoute();
// Utilizamos ref en lugar de valor primitivo
const film = ref({});
const isLoading = ref(false);

// Función para cargar los datos de la película
const loadFilmData = async () => {
  try {
      isLoading.value = true;
      const response = await axios.get('/api/films/' + route.params.id);
      film.value = response.data;
      console.log(response.data);
  } catch (error) {
    console.error('Error fetching film data:', error);
  } finally {
    isLoading.value = false;
  }
};

// Cargar los datos de la película cuando se monte el componente
onMounted(() => {
  // Cargar datos iniciales
  loadFilmData();
});

// Observar cambios en la ruta y cargar datos de la película en consecuencia
</script>
