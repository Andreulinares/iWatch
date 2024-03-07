<template>
<!--<iframe src="http://localhost/Laravel/iWatch/public/videos/prueba.mp4" frameborder="0"></iframe>-->

<!--<video src="http://localhost/Laravel/iWatch/public/videos/prueba.mp4" class="object-fit-fill w-100" autoplay loop>
  
</video>
-->
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


    <!--
    {{ films }}
    <table class="table table-hover table-sm">
        <tbody>
            <tr>
              <td v-for="(film, index) in films" :key="film.id">
                  <img width="300" :src="film.poster" alt="">
            </td>
            </tr>
        </tbody>
    </table>
    -->
    
</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";

const films = ref([]);
const swal = inject('$swal');

onMounted(() => {
    axios.get('/api/films')
        .then(response => {
            films.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
            console.error('Error fetching films:', error);
        });
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
</script>

<style>

:root{
  --itemGrow: 1.2;
--duration: 250ms;
}

html {
  scroll-behavior: smooth;
}

body {
  margin: 0;
  background-color: #000;
  font-family: Arial;
}

h1 {
  color: red;
  text-align: center;
}

.wrapper {
  display: grid;
  grid-template-columns: repeat(3,100%);
  overflow:hidden;
  scroll-behavior: smooth;

  section {
    width: 100%;
    position: relative;
    display: grid;
    grid-template-columns: repeat(5, auto);
    margin: 20px 0;
    
    .item {
      position: relative;
      padding: 0 2px;
      transition: --duration all;
      
      &:hover { 
        margin: 0 40px;
        transform: scale(1.2);
      }


      .heading {
        position: absolute;
        bottom: 20px;
        left: 20px;
        color: #fff;
      }

      .duration {
        position: absolute;
        bottom: 0;
        left: 20px;
        color: #fff;
      }
      
    }

    .arrow__btn {
      position: absolute;
      color: #fff;
      text-decoration: none;
      font-size: 6em;
      background:rgb(0,0,0);
      width: 80px;
      padding: 20px;
      text-align: center;
      z-index: 1;
    }

    .left-arrow {
      top:0; bottom:0; left:0;
      background: linear-gradient(-90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%);
    }
    
    .right-arrow {
      top:0; bottom:0; right: 0;
      background: linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%);
    }

  }
}
</style>
