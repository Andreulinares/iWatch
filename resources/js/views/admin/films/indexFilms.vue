<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las películas</h5>
                        <div>
                            <router-link :to="{ name: 'tasks.create' }" class="btn btn-success">Nueva película</router-link>
                        </div>
                    </div>

                    {{ films }}
                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th width="50" class="text-center">Id</th>
                                <th>Nombre</th>
                                <th>Sinopsis</th>
                                <th>Director</th>
                                <th>Puntuación</th>
                                <th>Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(film, index) in films" :key="film.id">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td>{{ film.name }}</td>
                                <td>{{ film.synopsis }}</td>
                                <td>{{ film.director }}</td>
                                <td>{{ film.punctuation }}</td>
                                <td>{{ film.duration }}</td>
                                <td class="text-center">
                                    <router-link :to="{ name: 'tasks.update', params: { id: film.id } }" class="btn btn-warning mr-1">Editar</router-link>
                                    <button class="btn btn-danger" @click="deleteFilm(film.id, index)">Eliminar</button>
                                </td>
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
    axios.delete(`/api/films/${id}`)
        .then(response => {
            films.value.splice(index, 1);
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
                    // Realizar acciones adicionales si es necesario después de confirmar la eliminación
                }
            });
        })
        .catch(error => {
            console.error('Error deleting film:', error);
            swal({
                icon: 'error',
                title: 'No se ha podido eliminar la película'
            });
        });
}
</script>

<style>
/* Estilos CSS aquí si es necesario */
</style>
