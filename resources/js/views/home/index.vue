<template>

  <video
      id="my-video"
      class="my-video vjs-default-skin"
      data-setup="{}"
      autoplay
      muted
    >
      <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
      <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/webm" />
      <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank"
          >supports HTML5 video</a
        >
      </p>
  </video>

    <!--
    <div class="wrapper">
      <section id="section1">
        <a href="#section3" class="arrow__btn left-arrow">‹</a>
        <div class="item" v-for="film in films" :key="film.id">
          <img :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
        </div>
        <a href="#section2" class="arrow__btn right-arrow">›</a>
      </section>

      <section id="section2">
        <a href="#section1" class="arrow__btn left-arrow">‹</a>
        <div class="item" v-for="film in films" :key="film.id">
          <img :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
        </div>
        <a href="#section3" class="arrow__btn right-arrow">›</a>
      </section>

      <section id="section3">
        <a href="#section2" class="arrow__btn left-arrow">‹</a>
        <div class="item" v-for="film in films" :key="film.id">
          <img :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
        </div>
        <a href="#section1" class="arrow__btn right-arrow">›</a>
      </section>
    </div>
    -->

    {{ films }}

    <div class="scrolling-buttons-container">
        <span id="scrolling-button-left">👈</span>
        <span id="scrolling-button-right">👉</span>
    </div>

    <div id="scrollCont" class="scrolling-container">
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card">
            <img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" />
            <h3>titulo</h3>
        </div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
        <div class="scrolling-card"><img class="image-item" width="248" src="https://3.bp.blogspot.com/-WAh31aMjams/Vg1tYoCafmI/AAAAAAAAClo/TaeTNSsb1ww/s1600/regresion_cartel_horizontal_promociones.jpg" alt="img-1" /></div>
    </div>

</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";
import 'https://vjs.zencdn.net/8.10.0/video.min.js';

import 'https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js';


const films = ref([]);
const swal = inject('$swal');

onMounted(() => {
    axios.get('/api/films/' + 1)
        .then(response => {
            films.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
            console.error('Error fetching films:', error);
        });
    addScrollEventListeners();
});

const deleteFilm = (id, index) => {
    swal({
        title: '¿Quieres eliminar la película?',
        text: '¡Esta acción no se puede deshacer!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        confirmButtonColor: '#ef4444',
        timer: 20000,
        timerProgressBar: true,
        reverseButtons: true
    })
    .then(result => {
        if (result.isConfirmed) {
            films.value.splice(index, 1);
            axios.delete(`/api/films/${id}`)
            .then( response => {
                swal({
                    title: 'Película eliminada',
                    icon: 'success',
                    timer: 10000,
                    timerProgressBar: true,
                })
            })
        }
    });
}

const addScrollEventListeners = () => {
  const rightBtn = document.getElementById("scrolling-button-right");
  const leftBtn = document.getElementById("scrolling-button-left");
  const content = document.getElementById("scrollCont");

  rightBtn.addEventListener("click", () => {
    content.scrollLeft += 800;
    console.log("derecha");
  });

  leftBtn.addEventListener("click", () => {
    content.scrollLeft -= 800;
    console.log("izquierda");
  });
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
    background-color: #141414;
    flex: 0 0 auto;
    margin: 5px;
    width: 250px;
    height: 150px;
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
        transform: scale(1.1);
        transition: transform 0.6s cubic-bezier(0, 0.55, 0.45, 1);
        height: 250px;
        overflow: visible;
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
