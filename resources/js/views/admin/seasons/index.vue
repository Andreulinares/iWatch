<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las películas</h5>
                        <div>
                            <router-link :to="{ name: 'seasons.create' }" class="btn btn-success">Nueva película</router-link>
                        </div>
                    </div>
                    {{ seasons }}
                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Contenido_id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(season, index) in seasons" :key="season.id">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td>{{ season.season_name }}</td>
                                <td>{{ season.content_id }}</td>
                                <!-- <td class="text-center">
                                    <router-link :to="{ name: 'seasons.update', params: { id: season.id } }" class="btn btn-warning mr-1">Editar</router-link>
                                    <button class="btn btn-danger" @click="deleteseason(season.id, index)">Eliminar</button>
                                </td> -->
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";

const seasons = ref([]);
const swal = inject('$swal');

onMounted(() => {
    axios.get('/api/seasons')
        .then(response => {
            seasons.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
            console.error('Error fetching seasons:', error);
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
            seasons.value.splice(index, 1);
            axios.delete(`/api/seasons/${id}`)
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
/* Estilos CSS aquí si es necesario */
</style>
