<template>
  <div class="container-fluid homeFluidCont d-flex justify-content-center">
      <div class="container m-0 p-0 homeContainer">
      <div class="mainVideo">
        <video id="my-video" class="my-video firstVideo vjs-default-skin" data-setup="{}" autoplay muted loop>
          <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
        </video>
        <h1>TITLE</h1>
      </div>

      <!-- <h1>{{ favorites }}</h1>
      <hr>
      <h1>{{ films }}</h1> -->

      <div class="row m-0" v-for="category in categoryList" :key="category.id">
        <h2>{{ category.name }}</h2>
        <Carousel :value="getFilmsByCategory(category.id)" :numVisible="5" :numScroll="3">
          <template #item="slotProps">
            <div class="border-1 surface-border border-round m-2 p-3">
              <img @click="info(slotProps.data)" class="image-item"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="350" :src="slotProps.data.media && slotProps.data.media[0]?.original_url ? slotProps.data.media[0].original_url : '/images/placeholder.jpg'" :alt="slotProps.data.name">
            </div>
          </template>
        </Carousel>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body p-0">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i class="pi pi-times" style="color: white"></i></button>
            <div class="videoCont">
              <video :key="film?.media[1]?.original_url" id="my-video" class="my-video vjs-default-skin w-100" data-setup="{}" autoplay muted loop>
                <source  :src="film?.media[1]?.original_url" type="video/mp4" />
              </video>
            </div>
            <div class="pt-4 px-4 pb-4">
              <div class="info">
                <div class="firstBlock d-flex justify-content-between">
                  <h2>{{ film.name }}</h2>
                  <div>
                    <p class="m-0">{{ film.duration }}h</p>
                    <p>{{ film.punctuation }}</p>
                  </div>
                </div>
                <p>{{ film.synopsis }}</p>
                <p>{{ film.director }}</p>
              </div>
              <hr>
              <div class="buttons d-flex justify-content-between">
                <router-link v-if="film && film.id" :to="{ name: 'player-films', params: { id: film.id } }" class="watch d-flex justify-content-center align-items-center">
                    <img src="images\playReproductorWhite.svg" alt="">
                    Reproducir
                </router-link>

                <button @click="sendFavorites(film.id)" class="favourite">
                  <img v-if="verifyFavorite(film.id)" class="favoriteIcon" src="images\cancel.svg" alt="">
                  <img v-else class="favoriteIcon" src="images\heartIcon.svg" alt="">
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";

import useCategories from "@/composables/categories";
import FilmsCarousel from "@/components/FilmsCarousel.vue";

import { useStore } from 'vuex';
import { computed } from "vue";
import { useRouter } from 'vue-router';

const route = useRouter();

const films = ref([]);
const film = ref({media:[]});
const swal = inject('$swal');
const infoModal = ref(null);
const { categoryList, getCategoryList } = useCategories();
const store = useStore();
const user = computed(() => store.state.auth.user)

const favorites = ref([]);

// Obtener películas
onMounted(() => {
  axios.get('/api/films/')
    .then(response => {
      films.value = response.data;
      console.log(response.data);
    })
    .catch(error => {
      console.error('Error fetching films:', error);
    });

    axios.get('/api/favoriteFilms')
    .then(response => {
      favorites.value = response.data.data;
      console.log(response.data);
    })
    .catch(error => {
      console.error('Error fetching favorites:', error);
    });
  // Obtener categorías
  getCategoryList();
});


// Función para filtrar las películas por categoría
const getFilmsByCategory = categoryId => {
  return films.value.filter(film => film.categoria_id == categoryId);
};

const info = (selectedFilm) => {
  console.log(selectedFilm);
  film.value = selectedFilm;
}

const sendFavorites = (filmId) => {
  if (verifyFavorite(filmId)) {
    // Si la película ya está marcada como favorita, eliminarla
    axios.delete(`/api/favorites/${filmId}`)
      .then(response => {
        console.log(response.data);
        swal({
          icon: 'success',
          title: 'Eliminada de favoritos'
        });
        // Actualizar la lista de favoritos eliminando el favorito
        favorites.value = favorites.value.filter(favorite => favorite.film_id !== filmId);
      })
      .catch(error => {
        console.error('Error removing favorite:', error);
        swal({
          icon: 'error',
          title: 'Error al eliminar de favoritos'
        });
      });
  } else {
    // Si la película no está marcada como favorita, agregarla como favorita
    axios.post('/api/favorites', {
      user_id: store.state.auth.user.id,
      film_id: filmId
    })
    .then(response => {
      console.log(response.data);
      swal({
        icon: 'success',
        title: 'Guardada en favoritos'
      });
      // Agregar el favorito a la lista de favoritos
      favorites.value.push(response.data.data);
    })
    .catch(error => {
      console.error('Error adding favorite:', error);
      swal({
        icon: 'error',
        title: 'Error al guardar en favoritos'
      });
    });
  }
}


// Función para verificar si una película con el ID especificado está en la lista de favoritos
const verifyFavorite = (movieId) => {
  return favorites.value.some(favorite => favorite.film_id === movieId);
}


</script>


<style>

    video{
        width: 100%;
    }

    .scrolling-container {
    display: flex;
    flex-wrap: nowrap;
    scroll-behavior: smooth;
    overflow-x: hidden;
    }

    .scrolling-card {
    background-color: white;
    flex: 0 0 auto;
    margin: 5px;
    width: 300px;
    height: 190px;
    text-align: center;
    overflow: hidden;
    border-radius: 5px;
    }

    .image-item{
        border-radius: 5px;
        width: 100%;
    }

    h3{
        margin: 0;
        text-align: left;
        display: none;
        color: white;
    }

    .scrolling-card:hover{
        transform: scale(1.05);
        transition: transform 0.6s cubic-bezier(0, 0.55, 0.45, 1);
        cursor: pointer;
    }

    .scrolling-card:hover h3{
        transition: 0.5s;
        display: block;
    }

    .scrolling-container::-webkit-scrollbar {
    display: none;
    }

    .scrolling-buttons-container {
    display: flex;
    justify-content: space-between;
    font-size: 25px;
    margin-left: 25px;
    margin-right: 25px;
    }

    /* ESTILOS DE LA BARRA DE SCROLL */
    /* width */
    ::-webkit-scrollbar {
    width: 0;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px transparent; 
    border-radius: 10px;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: transparent; 
    border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: transparent; 
    }

</style>