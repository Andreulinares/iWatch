<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">Añade una nueva serie</h5>
            </div>
            <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ strSuccess }}</strong>
            </div>
<!-- CREAR TAREAS-->

            <div v-if="strError" class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ strError }}</strong>
            </div>
                  {{ serie }} 
            <form @submit.prevent="addserie">
                <div class="form-group mb-2">
                    <label>Nombre</label><span class="text-danger"> *</span>
                    <input v-model="serie.name" type="text" class="form-control" placeholder="Nombre">
                </div>

                <div class="form-group mb-2">
                    <label>Sinopsis</label><span class="text-danger"> *</span>
                    <textarea v-model="serie.synopsis" class="form-control" rows="3" placeholder="Sinopsis"></textarea>
                </div>

                <div class="form-group mb-2">
                    <label>Director</label><span class="text-danger"> *</span>
                    <textarea v-model="serie.director" class="form-control" rows="3" placeholder="Director"></textarea>
                </div>

                <div class="form-group mb-2">
                    <label>Episodios</label><span class="text-danger"> *</span>
                    <input v-model="serie.episodes" type="number" class="form-control" min="0" placeholder="Episodios">
                </div>

                <div class="form-gorup mb-2">
                    <label>Duración</label><span class="text-danger">*</span>
                    <input v-model="serie.duration" class="form-control" type="time" step="1" name="date_open"/>
                </div>

                <div class="form-group mb-2">
                    <label>Temporadas</label><span class="text-danger"> *</span>
                    <input v-model="serie.seasons" type="number" class="form-control" min="0" placeholder="Temporadas">
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-4">Añadir serie</button>


            </form>


        </div>
    </div>
</template>


<script setup>
    import { ref } from "vue";

    const serie = ref({});

    const strError = ref();
    const strSuccess = ref();

    function addserie(){
        axios.post('/api/series', serie.value)
        .then(response =>{
            console.log(response);
            strSuccess.value = response.data.success;
            strError.value = "";
        }).catch(error =>{
            console.log(error);
            strSuccess.value = "";
            strError.value = error.response.data.message;
        });
    }
</script>


<style>
</style>
