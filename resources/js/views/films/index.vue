<template>
    <div class="cont-principal">
        <div class="limit">
            <Dropdown v-model="selectedFilter" :options="filters" optionLabel="label" placeholder="Select a filter" class="w-full md:w-14rem" />
            <div class="container-fluid">
                <div class="row rowFilms d-flex justify-content-center align-items-center">
                    <div v-for="(film, index) in films" :key="film.id" class="film-card">
                        <div class="miniature">
                            <img :src="film.media.length > 0 ? film.media[0].original_url : '/images/placeholder.jpg'" :alt="film.name" style="max-height: 100px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from "axios";
    import { ref, onMounted, watch, inject } from 'vue';
    import useCategories from "@/composables/categories";
    import Dropdown from 'primevue/dropdown';

    const films = ref([]);
    const swal = inject('$swal');

    const filters = ref([
    { label: 'All Movies', value: '0' },
    { label: 'Action', value: '1' },
    { label: 'Aventura', value: '2' },
    { label: 'Comedia', value: '3' },
    { label: 'Drama', value: '4' },
    { label: 'Ciencia ficción', value: '5' },
    { label: 'Terror', value: '6' },
    { label: 'Thriller', value: '7' },
    { label: 'Romance', value: '8' },
    { label: 'Animación', value: '9' },
    { label: 'Documental', value: '10' },
    { label: 'Misterio', value: '11' }
]);


    const selectedFilter = ref('0');
    
    const fetchFilmsByCategory = (categoryId) => {
    axios.get('/api/films/category/' + categoryId)
        .then(response => {
            films.value = response.data; // Asigna los nuevos datos directamente al arreglo films
            console.log(response.data);
        })
        .catch(error => {
            console.error('Error fetching films:', error);
        });
};





    onMounted(() => {
        fetchFilmsByCategory(selectedFilter.value);
    });

    watch(selectedFilter, (newValue) => {
        console.log('Categoría seleccionada:', newValue);
        fetchFilmsByCategory(newValue);
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