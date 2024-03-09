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
    
    <!--
        <div class="container">
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          L
        </button>
        <ul class="image-list">
            <img class="image-item" src="https://imagenes.20minutos.es/files/image_640_auto/uploads/imagenes/2023/02/07/lo-imposible-j-a-bayona-2012.jpeg" alt="img-1" />
            <img class="image-item" src="https://www.mubis.es/media/users/12828/321885/nuevo-poster-de-the-marvels-original.jpg" alt="img-1" />
            <img class="image-item" src="https://cdn.oldskull.net/wp-content/uploads/2015/07/Flore-Maquin-movie-posters-illustration-fight-club-.jpg" alt="img-1" />
            <img class="image-item" src="https://www.mubis.es/media/users/2514/306037/te-gustan-las-peliculas-de-terror-poster-de-scream-la-original-l_cover.jpg" alt="img-1" />
            <img class="image-item" src="https://www.posterscine.com/media/catalog/product/cache/1c91d037a1f0ef180108abb0973795cc/o/p/oppenheimer_poster.png" alt="img-1" />
            <img class="image-item" src="https://www.lahiguera.net/cinemania/pelicula/10138/nop-cartel-10474.jpg" alt="img-1" />
            <img class="image-item" src="https://www.carlosvillarin.com/wp-content/uploads/cartel-ready-player-one-2-carlos-villarin-freelance.jpg" alt="img-1" />
            <img class="image-item" src="https://imagenes.20minutos.es/files/image_640_auto/uploads/imagenes/2023/02/07/lo-imposible-j-a-bayona-2012.jpeg" alt="img-1" />
            <img class="image-item" src="https://imagenes.20minutos.es/files/image_640_auto/uploads/imagenes/2023/02/07/lo-imposible-j-a-bayona-2012.jpeg" alt="img-1" />
            <img class="image-item" src="https://imagenes.20minutos.es/files/image_640_auto/uploads/imagenes/2023/02/07/lo-imposible-j-a-bayona-2012.jpeg" alt="img-1" />
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          R
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>
-->

    <div class="scrolling-buttons-container">
        <span id="scrolling-button-left">👈</span>
        <span id="scrolling-button-right">👉</span>
    </div>

    <div class="scrolling-container">
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
      <div class="scrolling-card"><h2>Soy una card Feliz</h2></div>
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
  const rightBtn = document.querySelector("#scrolling-button-right");
  const leftBtn = document.querySelector("#scrolling-button-left");
  const content = document.querySelector(".scrolling-container");

  rightBtn.addEventListener("click", () => {
    content.scrollLeft += 800;
  });

  leftBtn.addEventListener("click", () => {
    content.scrollLeft -= 800;
  });
};

// Codigo para el carrusel
// ************************************************************************************************************************************************************************************************************************************************************************
/*
const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
    
    // Handle scrollbar thumb drag
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
        
        // Update thumb position on mouse move
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;

            // Ensure the scrollbar thumb stays within bounds
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
            
            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        // Remove event listeners on mouse up
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

     // Show or hide slide buttons based on scroll position
    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    }

    // Update scrollbar thumb position based on image scroll
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }

    // Call these two functions when image list scrolls
    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);
*/
// ************************************************************************************************************************************************************************************************************************************************************************

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


.scrolling-container {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto;
  scroll-behavior: smooth;
}

.scrolling-card {
  flex: 0 0 auto;
  border: solid 1px black;
  margin: 10px;
  width: 250px;
  height: 150px;
  text-align: center;
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

/*
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
*/

/* ESTILOS CARRUSEL */
/*
.container {
  width: 100%;
  margin: 0;
}

.slider-wrapper {
  position: relative;
}

.image-list{
    background-color: red;
}

.slider-wrapper .slide-button {
  position: absolute;
  top: 50%;
  outline: none;
  border: none;
  height: 50px;
  width: 50px;
  z-index: 5;
  color: #fff;
  display: flex;
  cursor: pointer;
  font-size: 2.2rem;
  background: #000;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transform: translateY(-50%);
}

.slider-wrapper .slide-button:hover {
  background: #404040;
}

.slider-wrapper .slide-button#prev-slide {
  left: -25px;
  display: none;
}

.slider-wrapper .slide-button#next-slide {
  right: -25px;
}

.slider-wrapper .image-list {
  display: grid;
  grid-template-columns: repeat(10, 1fr);
  gap: 18px;
  font-size: 0;
  list-style: none;
  margin-bottom: 30px;
  overflow-x: auto;
  scrollbar-width: none;
}

.slider-wrapper .image-list::-webkit-scrollbar {
  display: none;
}

.slider-wrapper .image-list .image-item {
  width: 325px;
  height: 400px;
  object-fit: cover;
}

.container .slider-scrollbar {
  height: 24px;
  width: 100%;
  display: flex;
  align-items: center;
}

.slider-scrollbar .scrollbar-track {
  background: #ccc;
  width: 100%;
  height: 2px;
  display: flex;
  align-items: center;
  border-radius: 4px;
  position: relative;
}

.slider-scrollbar:hover .scrollbar-track {
  height: 4px;
}

.slider-scrollbar .scrollbar-thumb {
  position: absolute;
  background: #000;
  top: 0;
  bottom: 0;
  width: 50%;
  height: 100%;
  cursor: grab;
  border-radius: inherit;
}

.slider-scrollbar .scrollbar-thumb:active {
  cursor: grabbing;
  height: 8px;
  top: -2px;
}

.slider-scrollbar .scrollbar-thumb::after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -10px;
  bottom: -10px;
}

*/
/* Styles for mobile and tablets */
/*
@media only screen and (max-width: 1023px) {
  .slider-wrapper .slide-button {
    display: none !important;
  }

  .slider-wrapper .image-list {
    gap: 10px;
    margin-bottom: 15px;
    scroll-snap-type: x mandatory;
  }

  .slider-wrapper .image-list .image-item {
    width: 280px;
    height: 380px;
  }

  .slider-scrollbar .scrollbar-thumb {
    width: 20%;
  }
}

*/
</style>
