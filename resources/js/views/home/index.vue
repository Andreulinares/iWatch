<template>
  <div class="container-fluid p-0">
    <video id="my-video" class="my-video vjs-default-skin" data-setup="{}" autoplay muted loop>
      <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
    </video>

    <div class="row m-0" v-for="category in categoryList" :key="category.id">
      <h2>{{ category.name }}</h2>
      <Carousel :value="getFilmsByCategory(category.id)" :numVisible="5" :numScroll="3" :responsiveOptions="responsiveOptions">
        <template #item="slotProps">
          <div class="border-1 surface-border border-round m-2 p-3">
            <div class="mb-3">
              <div class="relative mx-auto">
                <FilmCarousel :peliculas="getFilmsByCategory(category.id)" />
              </div>
            </div>
            <!-- <img class="image-item"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="350" :src="slotProps.data.media[0]?.original_url" :alt="A" style="max-height: 100px;"> -->
            <img v-click="infoModal = slotProps.data" class="image-item"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="350" :src="slotProps.data.media && slotProps.data.media[0]?.original_url ? slotProps.data.media[0].original_url : '/images/placeholder.jpg'" :alt="slotProps.data.name" style="max-height: 100px;">
            <p>{{ slotProps.data }}</p>
            <!-- <div class="flex justify-content-between align-items-center">
              <span>
                <Button icon="pi pi-heart" severity="secondary" outlined />
              </span>
            </div> -->
          </div>
        </template>
      </Carousel>
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <!-- <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div> -->
          <div class="modal-body p-0">
            <video id="my-video" class="my-video vjs-default-skin w-100" data-setup="{}" autoplay muted>
              <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
            </video>
            <div class="buttons d-flex">
              <button>Reproducir</button>
              <button>Guardar</button>
            </div>
            <div class="info">
              <p id="description">{{ infoModal }}</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
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

const films = ref([]);
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
