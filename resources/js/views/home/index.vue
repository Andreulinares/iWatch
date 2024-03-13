<template>
    <div class="container-fluid p-0">
      <video id="my-video" class="my-video vjs-default-skin" data-setup="{}" autoplay muted loop>
        <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
      </video>
      
  
      <!-- Iterar sobre las categorías -->
      <div class="row m-0" v-for="category in categoryList" :key="category.id">
        <h2>{{ category.name }}</h2>
  
        <!-- Utilizar el componente Carousel para mostrar las películas -->
        <Carousel :value="getFilmsByCategory(category.id)" :numVisible="5" :numScroll="3" :responsiveOptions="responsiveOptions">
          <template #item="slotProps">
            <div class="border-1 surface-border border-round m-2 p-3">
              <div class="mb-3">
                <img class="image-item" width="248" :src="slotProps.data.media.length > 0 ? slotProps.data.media[0].original_url : '/images/placeholder.jpg'" :alt="slotProps.data.name" style="max-height: 100px;">
              </div>
              <div class="mb-3 font-medium">{{ slotProps.data.name }}</div>
              <div class="flex justify-content-between align-items-center">
                <span>
                  <Button icon="pi pi-heart" severity="secondary" outlined />
                </span>
              </div>
            </div>
          </template>
        </Carousel>
      </div>
    </div>
  </template>
  
  <script setup>
  import axios from "axios";
  import { ref, onMounted } from "vue";
  import useCategories from "@/composables/categories";
  
  const films = ref([]);
  const { categoryList, getCategoryList } = useCategories();
  
  const responsiveOptions = ref([
    {
      breakpoint: '1400px',
      numVisible: 2,
      numScroll: 1
    },
    {
      breakpoint: '1199px',
      numVisible: 3,
      numScroll: 1
    },
    {
      breakpoint: '767px',
      numVisible: 2,
      numScroll: 1
    },
    {
      breakpoint: '575px',
      numVisible: 1,
      numScroll: 1
    }
  ]);
  
  onMounted(() => {
    axios.get('/api/films/')
      .then(response => {
        films.value = response.data;
      })
      .catch(error => {
        console.error('Error fetching films:', error);
      });
    getCategoryList();
  });
  
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
