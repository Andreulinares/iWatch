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
            <video ref="videoPlayer" @play="onPlay" @pause="onPause" style="max-height: 500px;">
              <source :src="film.media[1].original_url" type="video/mp4">
            </video>
            <div class="button-container">
              <button @click="togglePlayback">{{ isPlaying ? 'Pausar' : 'Reproducir' }}</button>
              <button @click="toggleFullScreen">Pantalla Completa</button>
              <button @click="toggleMute">{{ isMuted ? 'Activar Sonido' : 'Desactivar Sonido' }}</button>
            </div>
            <router-link to="/Home" class="btn btn-primary btn-volver">Volver</router-link>
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

const route = useRoute();
const film = ref(null);
const isLoading = ref(false);
const isPlaying = ref(false);
const isMuted = ref(false);
const videoPlayer = ref(null); // Ref para el elemento de video

const togglePlayback = () => {
  if (isPlaying.value) {
    videoPlayer.value.pause();
  } else {
    videoPlayer.value.play();
  }
  isPlaying.value = !isPlaying.value;
};

const onPlay = () => {
  isPlaying.value = true;
};

const onPause = () => {
  isPlaying.value = false;
};

const toggleFullScreen = () => {
  if (videoPlayer.value.requestFullscreen) {
    videoPlayer.value.requestFullscreen();
  } else if (videoPlayer.value.mozRequestFullScreen) { /* Firefox */
    videoPlayer.value.mozRequestFullScreen();
  } else if (videoPlayer.value.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    videoPlayer.value.webkitRequestFullscreen();
  } else if (videoPlayer.value.msRequestFullscreen) { /* IE/Edge */
    videoPlayer.value.msRequestFullscreen();
  }
};

const toggleMute = () => {
  videoPlayer.value.muted = !videoPlayer.value.muted;
  isMuted.value = videoPlayer.value.muted;
};
//Obtener pelicula usando la id pasada por parametro 
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

onMounted(() => {
  loadFilmData();
});
</script>

<style scoped>

  video{
    width: 100%;
  }

  button {
    background-color: #007bff; /* Color de fondo */
    color: #ffffff; /* Color del texto */
    border: none; /* Eliminar el borde */
    padding: 10px 20px; /* Espaciado interno */
    cursor: pointer; /* Cambiar el cursor al pasar sobre el botón */
    position: relative;
    left: 350px;
    bottom: 46px;
  }

  button:hover {
    background-color: #0056b3; /* Cambiar color de fondo al pasar sobre el botón */
  }

  .btn-volver{
    border-radius: 5px;
    width: 80px;
    position: absolute;
    bottom: 310px;
    left: 130px;
}

  @media (max-width: 576px) {
      .button-container {
        position: relative;
        right: 350px;
      }

      .btn-volver {
        top: 450px;
        left: 30px;
        height: 35px;
      }
  }
</style>
