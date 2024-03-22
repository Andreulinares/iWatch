<template>
    <div class="cont-principal">

        <!-- <div v-for="category in categories.data" :key="category.id" class="texto-1">
            {{ category.name }}
        </div> -->

        <!--<div class="filtro">
            <label>Buscar:</label>
            <input v-model="filtro" type="text" />
            <button @click="buscarPelicula">Buscar</button>
        </div>-->
        <!-- <div class="buscador">
            <input v-model="search_global" type="text" placeholder="Buscar...">
        </div> -->
        
    </div>

    <div class="container-fluid pt-5 mt-5">
        <div class="row">
            <div v-for="(film, index) in films" :key="film.id" class="col-md-3 col-sm-2 mb-4">
                <div class="film-card">
                    <img :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from "axios";
    import { ref, onMounted, inject } from 'vue';
    import useCategories from "@/composables/categories";

    // export default {
    //     setup() {
    //         const { categories, getCategories, getCategoryList } = useCategories();

    //         onMounted(() => {
    //         getCategories();
    //         getCategoryList();
    //         console.log(categories);
    //         });

    //         return {
    //         categories
    //         };
    //     },
    // };

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

</script>

<style>
    .cont-principal{
        background-color: black;
    }
    .texto-1{
        color: white;
        font-size: 25px;
    }

</style>