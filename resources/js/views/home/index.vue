<template>
  <div class="container-fluid p-0">
    <video id="my-video" class="my-video vjs-default-skin" data-setup="{}" autoplay muted loop>
      <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
    </video>

    <div class="row m-0" v-for="category in categoryList" :key="category.id">
      <h2>{{ category.name }}</h2>
      <Carousel :value="getFilmsByCategory(category.id)" :numVisible="5" :numScroll="3">
        <template #item="slotProps">
          <div class="border-1 surface-border border-round m-2 p-3">
            <img @click="info(slotProps.data)" class="image-item"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="350" :src="slotProps.data.media && slotProps.data.media[0]?.original_url ? slotProps.data.media[0].original_url : '/images/placeholder.jpg'" :alt="slotProps.data.name" style="max-height: 100px;">
          </div>
        </template>
      </Carousel>
    </div>
    
  </div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <div class="modal-body p-0">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i class="pi pi-times" style="color: white"></i></button>
            <video id="my-video" class="my-video vjs-default-skin w-100" data-setup="{}" autoplay muted loop>
              <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
            </video>
            <div class="pt-4 px-4 pb-4">
              <div class="buttons d-flex">
                <button class="watch d-flex justify-content-center align-items-center">
                  <img src="images\playReproductorWhite.svg" alt="">
                  Reproducir
                </button>
                <button class="favourite">Mi lista</button>
              </div>
              <div class="info">
                <h2>{{ film.name }}</h2>
                <p>{{ film.synopsis }}</p>
                <hr>
                <p>{{ film.duration }}h</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-backdrop fade" data-bs-dismiss="modal" aria-hidden="true"></div>
    </div>

</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";

import useCategories from "@/composables/categories";
import FilmsCarousel from "@/components/FilmsCarousel.vue";

const films = ref([]);
const film = ref({});
const swal = inject('$swal');
const infoModal = ref(null);
const { categoryList, getCategoryList } = useCategories();

// ... Tu lógica existente ...

// Obtener películas por id
onMounted(() => {
  axios.get('/api/films/')
    .then(response => {
      films.value = response.data;
      console.log(response.data);
    })
    .catch(error => {
      console.error('Error fetching films:', error);
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
