<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las peliculas</h5>
                        <div>
                            <router-link :to="{name: 'tasks.create'}" class="btn btn-success">Nueva película</router-link>
                        </div>
                    </div>

                    {{ films }}
                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Synopsis</th>
                                <th>Director</th>
                                <th>Punctuation</th>
                                <th>Duration</th>
                                <th class="text-center" width="200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(film, index) in films">
                                <td class="text-center">{{ film.id }}</td>
                                <td>{{film.name}}</td>
                                <td>{{film.synopsis}}</td>
                                <td>{{film.director}}</td>
                                <th>{{film.punctuation}}</th>
                                <th>{{film.duration}}</th>
                                <td class="text-center">
                                    <router-link :to="{name: 'tasks.update', params: {id:task.id}}" class="btn btn-warning mr-1">Edit</router-link>
                                    <button class="btn btn-danger" @click="deleteTask(task.id, index)">Delete</button>
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
import {ref, inject, onMounted} from "vue";
const film = ref();
const swal = inject('$swal');

    onMounted(()=>{
        //console.log('Mi vista esta montada');
        axios.get('/api/films')
        .then(response => {
            films.value = response.data;
            console.log(response.data);
        })
    });

    const deleteTask = (id, index) =>{
        axios.delete('/api/tasks/'+id)
        .then(response =>{
            tasks.value.splice(index,1)
            swal({
                title: 'Quieres eliminar la tarea?',
                text: 'Esta acción no es reversible!',
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
                
            }
        })

        }).catch(error =>{
            swal({
                icon: 'error',
                title: 'No se ha podido eliminar la tarea'
            })
        });
    }
</script>


<style>


</style>