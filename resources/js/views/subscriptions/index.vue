<template>
    <section class="mt-5 pt-5">
        <h1>Suscripciones</h1>
        <div class="row d-flex justify-content-center align-items-center">
            <div v-for="sub in subscriptions" :key="sub.id"  class="container col-xs-12 col-sm-6 col-md-4 col-lg-3 suscripcion p-3">
                <div class="medal" :class="{ 'bronze-medal': sub.id === 1, 'silver-medal': sub.id === 2, 'gold-medal': sub.id === 3 }" ></div>
                <h1>{{ sub.name }}</h1>
                <h2>{{ sub.price }}€ mensuales</h2>
                <h3>{{ sub.duration }}</h3>
                <h3>Description</h3>
                <button>Upgrade plan</button>
            </div>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, inject, onMounted } from "vue";

const subscriptions = ref([]);

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