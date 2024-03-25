<template>
  <div>
    <div v-if="isLoading">
      <p>Cargando...</p>
    </div>
    <div v-else>
      <div v-if="film">
        <div v-if="film.media && film.media.length > 0">
          <!-- Elemento de video con ref -->
          <div class="video-container">
            <video ref="videoPlayer" class="video-js" controls preload="auto" style="max-height: 500px;">
              <source :src="film.media[1].original_url" type="video/mp4">
            </video>
          </div>
        </div>
        <div v-else>
          <p>No se encontró ningún video para esta película.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import 'video.js/dist/video-js.css';
import videojs from 'video.js';

const route = useRoute();
const film = ref(null);
const isLoading = ref(false);
const videoPlayer = ref(null); // Ref para el elemento de video

const loadFilmData = async () => {
  try {
    isLoading.value = true;
    const response = await axios.get('/api/films/' + route.params.id);
    film.value = response.data;
    console.log(response.data);

    // Llama a videojs cuando el componente se haya montado completamente
    onMounted(() => {
      videojs(videoPlayer.value, { /* Opciones personalizadas si es necesario */ }, function() {
        console.log('Reproductor de video inicializado');
      });
    });

  } catch (error) {
    console.error('Error fetching film data:', error);
  } finally {
    isLoading.value = false;
  }
};

onMounted(() => {
  loadFilmData();
});
</script>

<style scoped>
 .video-container .vjs-big-play-button {
  /* Personaliza el botón de reproducción */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 60px;
  border: 2px solid #fff;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  font-size: 24px;
  line-height: 60px;
  text-align: center;
  cursor: pointer;
  z-index: 2;
}

/* Estilo personalizado para el ícono del botón de reproducción */
.video-container .vjs-icon-placeholder:before {
  /* Ajusta el ícono del botón de reproducción */
  font-size: 30px;
}
</style>
