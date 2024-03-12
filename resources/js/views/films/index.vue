<template>
    <div class="cont-principal">

        <div v-for="category in categories.data" :key="category.id" class="texto-1">
            {{ category.name }}
        </div>

        <!--<div class="filtro">
            <label>Buscar:</label>
            <input v-model="filtro" type="text" />
            <button @click="buscarPelicula">Buscar</button>
        </div>-->
        <div class="buscador">
            <input v-model="search_global" type="text" placeholder="Buscar...">
        </div>
        
    </div>
</template>

<script>
    import { ref, onMounted } from 'vue';
    import useCategories from "@/composables/categories";

    export default {
        setup() {
            const { categories, getCategories, getCategoryList } = useCategories();

            onMounted(() => {
            getCategories();
            getCategoryList();
            console.log(categories);
            });

            return {
            categories
            };
        },
    };


</script>

<style>
    .cont-principal{
        background-color: black;
    }
    .texto-1{
        color: white;
        font-size: 25px;
    }
    .buscador{

    }

</style>