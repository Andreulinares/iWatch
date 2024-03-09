<template>

  <video
      id="my-video"
      class="my-video vjs-default-skin"
      controls
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

    <!--
  <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3">Carousel cards title </h3>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->
    
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

video{
  width: 100%;
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
