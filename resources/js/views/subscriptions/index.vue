<template>
    <section class="container-fluid mt-5 pt-5 d-flex justify-content-center align-items-center">
        <div class="row d-flex justify-content-center align-items-center filaSubs">
            <h1>Elige tú plan</h1>
            <div v-for="sub in subscriptions" :key="sub.id"  class="container col-xs-12 col-sm-6 col-md-4 col-lg-3 suscripcion p-3 m-2">
                <div class="medal" :class="{ 'bronze-medal': sub.id === 1, 'silver-medal': sub.id === 2, 'gold-medal': sub.id === 3 }" ></div>
                <!-- <div class="infoCampo">
                    <span>Nombre</span>
                    <p>{{ sub.name }}</p>
                </div> -->
                <div class="infoCampo precio">
                    <p>{{ sub.price }}€ <span>/month</span> </p>
                </div>
                <p>{{ sub.name }}</p>
                <hr>
                <p>{{ sub.resolution }}</p>
                <hr>
                <p>{{ sub.duration }}</p>
                <hr>
                <p>{{ sub.quality }}</p>
                <!-- <div class="infoCampo">
                    <span>Duración</span>
                    <p>{{ sub.duration }}</p>    
                </div>
                <div class="infoCampo">
                    <span>Descripción</span>
                    <p>Description</p>
                </div> -->
                <button class="buyBtn" @click="comprarSuscripcion(sub.id)">Upgrade plan</button>
            </div>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";
import { useRouter } from 'vue-router';
import {useForm, useField, defineRule} from "vee-validate";
import {required, min} from "@/validation/rules";

const subscriptions = ref([]);

// Mostrar suscripciones 
onMounted(() => {
  axios.get('/api/suscripciones')
    .then(response => {
        subscriptions.value = response.data;
      console.log(response.data);
    })
    .catch(error => {
      console.error('Error fetching subscriptionss:', error);
    });
});

// Función para comprar suscripción
function comprarSuscripcion(subscriptionId) {
    let days = 30;
    if(subscriptionId === 2){
        days = 60
    }else if(subscriptionId === 3){
        days = 90
    }
    axios.post(`/api/subscriptions/${subscriptionId}`,{days: days})
        .then(response => {
            alert('Suscripción comprada con éxito:', response.data);
            cargarSuscripciones();
        })
        .catch(error => {
            console.error('Error al comprar suscripción:', error);
        });
}

// Función para recargar la lista de suscripciones después de la compra
function cargarSuscripciones() {
    axios.get('/api/suscripciones')
        .then(response => {
            subscriptions.value = response.data;
        })
        .catch(error => {
            console.error('Error fetching subscriptions:', error);
        });
}

</script>

<style scoped>
    .bronze-medal {
        background-color: #CD7F32;
        /* Agrega cualquier otro estilo que desees */
    }

    .silver-medal {
        background-color: #C0C0C0;
        /* Agrega cualquier otro estilo que desees */
    }

    .gold-medal {
        background-color: #DAA520;
        /* Agrega cualquier otro estilo que desees */
    }
</style>